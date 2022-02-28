// Datepicker
var dates = {}
dates[new Date('10/23/2022')] = '-40%';
dates[new Date('12/14/2022')] = '-20%';
dates[new Date('01/25/2023')] = '-30%';

$('#DatePicker').datepicker({
    showButtonPanel: false,
    inline: true,
    altField: '#datepicker_field',
    minDate: 0,
    beforeShowDay: function(date) {
        console.log(date);
    var mdate = new Date('3/8/2021');
    console.log(mdate);
    if(mdate == date)
    {
        alert();
    }
        return [true, '', ''];
/*
        var hlText = dates[date];
        var date2 = new Date(date);
        var tglAja = date.getDate();
        console.log("tglAja"+tglAja);
        
        if (hlText) {
            console.log("hlText"+hlText);
            updateDatePickerCells(tglAja, hlText);
            return [true, "", hlText];
        } else {
            return [true, '', ''];
        }*/
    },
    onSelect: function(date) {
            load_slots(date);
        }



});
$(document).ready(function(){
    // $('#datepicker_field').val("8/11/2.011");
    // alert($('#datepicker_field_new').val());
    if($('#datepicker_field_new').val())
    {
    $('#DatePicker').datepicker("setDate", new Date($('#datepicker_field_new').val()) );
    }


});

function updateDatePickerCells(a, b) {

    var num = parseInt(a);

    setTimeout(function() {

        $('.ui-datepicker td > *').each(function(idx, elem) {

            if ((idx + 1) == num) {
                value = b;
            } else {
                value = 0;
            }

            var className = 'datepicker-content-' + CryptoJS.MD5(value).toString();

            if (value == 0)
                addCSSRule('.ui-datepicker td a.' + className + ':after {content: "\\a0";}'); //&nbsp;
            else
                addCSSRule('.ui-datepicker td a.' + className + ':after {content: "' + value + '";}');

            $(this).addClass(className);
        });
    }, 0);
}
var dynamicCSSRules = [];

function addCSSRule(rule) {
    if ($.inArray(rule, dynamicCSSRules) == -1) {
        $('head').append('<style>' + rule + '</style>');
        dynamicCSSRules.push(rule);
    }
}

$('#datepicker_field').on('change', function() {
    $('#DatePicker').datepicker('setDate', $(this).val());
});
function select_slot(id)
{
    var mid = '#time_'+id;
    var value = $(mid).val();
    // alert(value);
    $('#selected_time').text(value);
    $('#selected_time1').text(value);
    $('input[name="bslot"]').val(id);
    $('#drop_show').removeClass('show');
}
function load_slots(date)
{
    var pid = $('input[name="product_id"]').val();
$.ajax({url: AJAX_URL, data:{pid:pid,date:date,action:' load_slots'}, success: function(result){
    $('#drop_show').addClass('show');
    var loader = '<div class="col-sm-12 search-results-lawyer content_day loader_div" style="height: 100px;">';
               loader += '     <img src="'+ASSET_URL+'/img/load.gif">';
                loader += '</div>';
                $('#drop_show').html(loader);
                setTimeout(function(){ $('#drop_show').html(result); }, 3000);
  }});
}
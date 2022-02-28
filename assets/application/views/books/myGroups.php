
<div class="container">
    <div class="mygroup">
        <div class="row">
            <div class="col-sm-8 col-md-10">
                <h2>My Groups</h2>
            </div>
            <div class="col-sm-4 col-md-2">
                <a href="<?php echo base_url('groups/create'); ?>" class="btn btn-lg btn-block btn-primary btn-h2-spacing">Create Group</a>
            </div>
        </div>
        <div class="row col-md-12">
            <hr>
        </div>
        <?php if ($this->session->flashdata('success')): ?>
        <div class="row col-md-12"> 
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Success!</strong> <?= $this->session->flashdata('success'); ?>
            </div>
        </div>  
        <?php endif ?>
        <?php if ($this->session->flashdata('warning')): ?>
        <div class="row col-md-12"> 
            <div class="alert alert-warning alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Warning!</strong> <?= $this->session->flashdata('warning'); ?>
            </div>
        </div>  
        <?php endif ?>
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-condensed">
                    <thead>
                        <tr><th>#</th>
                        <th>Name</th>
                        <th class="hidden-xs hidden-sm">Description</th>
                        <th class="hidden-xs hidden-sm">Created</th>
                        <th></th>
                        <th></th>
                    </tr></thead>
                    <tbody>
                        <?php if (isset($groups)&&!empty($groups)): ?>
                            <?php foreach ($groups as $key => $value): ?>
                                <tr>
                                    <td><?= $key+1; ?> </td>
                                    <td><a href=""><?= $value['name'] ?></a></td>
                                    <td class="hidden-xs hidden-sm"><?= $value['description'] ?>
                                        
                                    </td>
                                    <td class="hidden-xs hidden-sm"><?= date('d M, Y',strtotime($value['create_at'])) ?>
                                        
                                    </td>
                                    <td>
                                        <?php $CI =& get_instance();
                     ?>
                                        <a href="#" class="btn btn-success" title="Click to view books available in this group">Group Books (<?php $CI->template->booKsOfGroup($value['groupID']); ?>)</a>
                                    </td>
                                    <td>
                                        <?php if ($value['userID']==$user_id): ?>
                                        <form method="POST" action="<?= base_url().'groups/delete' ?>">
                                            <input type="submit" value="Delete group" class="btn btn-warning " title="This group you own has no members. You are able to delete it.">
                                            <input type="hidden" name="group" value="<?= $value['groupID'] ?>">
                                        </form>
                                        <?php else: ?>﻿
                                        <form method="POST" action="<?= base_url().'groups/leave' ?>">
                                            <input type="submit" value="Leave group" class="btn btn-success " title="This group you own has no members. You are able to delete it.">
                                            <input type="hidden" name="group" value="<?= $value['groupID'] ?>">
                                        </form>
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url().'groups/invite' ?>" class="btn btn-primary">Invite Friends</a>
                                        
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
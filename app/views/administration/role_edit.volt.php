<!DOCTYPE HTML>
<html>
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <title>Preview all role - ICS</title>
        
        <?php foreach ($js as $file) { ?>
        <script type="text/javascript" src="<?php echo $file; ?>"></script>
        <?php } ?>
        
        <?php foreach ($css as $file) { ?>
        <link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" />
        <?php } ?>
        
        
<script type="text/javascript">
$(function(){
    var t = $('input:checkbox:not(:checked).trigger').closest('tr');
    t.find('input:checkbox:not(.trigger)').attr('disabled','');
    $('input:checkbox.trigger').bind('change',function(){
        if(!this.checked)
        {
            $(this).closest('tr').find('input:checkbox:not(.trigger)').attr('checked',false);
            $(this).closest('tr').find('input:checkbox:not(.trigger)').attr('disabled','');
        }else{
            $(this).closest('tr').find('input:checkbox:not(.trigger)').removeAttr('disabled');
        }
    });
});
</script>

    </head>
    <body onload="jsAsync.init();">
        <div class="main">
        <header class="header">
    <div class="container-fluid">
        <div class="row">
            
            <div class="header-btn_logo col-xs-12 col-sm-3 col-md-2">
                <table width="100%">
                    <tr>
                        <td class="logo">
                            <a href="/"><img src="/img/logo.png"></a>
                        </td>
                        <td class="header-btn">
                            <ul class="nav navbar-left">
                                <li class="jsOnClick_menu work-btn <?=($TopMenuSelected == 'work')?'active':''?>"><a href="/work"><span>&nbsp;</span></a></li>
                                <li class="jsOnClick_menu settings-btn <?=($TopMenuSelected == 'settings')?'active':''?>"><a href="/settings"><span>&nbsp;</span></a></li>
                                <li class="jsOnClick_menu messages-btn <?=($TopMenuSelected == 'messages')?'active':''?>"><a href="/messages"><span>&nbsp;</span></a></li>
                            </ul>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="header-user_name col-xs-1 col-xs-offset-11 col-sm-3 col-sm-offset-6 col-md-2 col-md-offset-8">
                <span class="font_style_4">Добро пожаловать, <?=Users::getUserName()?></span>
            </div>
            
        </div>
    </div>
</header>
        
        

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                    <div class="content-left_column col-xs-12 col-sm-3 col-md-2">
    <ul class="nav">
        <li><?=ResourceStrings::getStringLang('package')?></li>
        <li class="jsOnClick_submenu <?=($MenuSelected == 'add')?'selected':''?>"><a href="#"><?=ResourceStrings::getStringLang('package_add')?></a><div class="ico">&nbsp;</div>
            <ul class="nav">
                <li class="<?=($MenuSelected.$MenuItemActive == 'addfile')?'active':''?>"><a href="/package/add/file">Из файла</a></li>
                <li class="<?=($MenuSelected.$MenuItemActive == 'addregister')?'active':''?>"><a href="/package/add/register">С регистрацией</a></li>
                <li class="<?=($MenuSelected.$MenuItemActive == 'addone')?'active':''?>"><a href="/package/add/one">Единичный</a></li>
            </ul>
        </li>
        <li class="jsOnClick_submenu"><a href="#">Выпуск</a><div class="ico">&nbsp;</div>
            <ul class="nav">
                <li><a href="/">Отправка по манифесту</a></li>
                <li><a href="/">Передача в зону выдачи</a></li>
                <li><a href="/">Выдача получателю</a></li>
                <li><a href="/">Доставка получателю</a></li>
            </ul>
        </li>
        <li class="jsOnClick_submenu"><a href="#">Хранение</a><div class="ico">&nbsp;</div>
            <ul class="nav">
                <li><a href="/">Передать на хранение</a></li>
            </ul>
        </li>
    </ul>

    <ul class="nav">
        <li>Статистика и отчёты</li>
        <li class="jsOnClick_submenu"><a href="#">Отчеты МЭО</a><div class="ico">&nbsp;</div></li>
        <li class="jsOnClick_submenu"><a href="#">Статистика</a><div class="ico">&nbsp;</div></li>
    </ul>

    <ul class="nav">
        <li>Администрирование</li>
        <li class="jsOnClick_submenu <?=($MenuSelected == 'role')?'selected':''?>"><a href="#">Роли</a><div class="ico">&nbsp;</div>
            <ul class="nav">
                <li class="<?=($MenuSelected.$MenuItemActive == 'roleadd')?'active':''?>"><a href="/administration/role/add">Создать</a></li>
                <li class="<?=($MenuSelected.$MenuItemActive == 'rolepreview')?'active':''?>"><a href="/administration/role/preview">Просмотр</a></li>
                <li class="<?=($MenuSelected.$MenuItemActive == 'roleedit')?'active':''?>"><a href="/administration/role/edit">Редактировать</a></li>
            </ul>
        </li>
        <li class="jsOnClick_submenu <?=($MenuSelected == 'reference')?'selected':''?>"><a href="#">Глобальные настройки</a><div class="ico">&nbsp;</div>
            <ul class="nav">
                <li class="<?=($MenuSelected.$MenuItemActive == 'referenceedit')?'active':''?>"><a href="/administration/reference/edit">Редактировать</a></li>
            </ul>
        </li>
        <li class="jsOnClick_submenu <?=($MenuSelected == 'stations')?'selected':''?>"><a href="#">Станции</a><div class="ico">&nbsp;</div>
            <ul class="nav">
                <li class="<?=($MenuSelected.$MenuItemActive == 'stationsadd')?'active':''?>"><a href="/administration/station/add">Создать</a></li>
                <li class="<?=($MenuSelected.$MenuItemActive == 'stationspreview')?'active':''?>"><a href="/administration/station/preview">Просмотр</a></li>
                <li class="<?=($MenuSelected.$MenuItemActive == 'stationsedit')?'active':''?>"><a href="/administration/station/edit">Редактировать</a></li>
            </ul>
        </li>
        <li class="jsOnClick_submenu <?=($MenuSelected == 'user')?'selected':''?>"><a href="#">Пользователи</a><div class="ico">&nbsp;</div>
            <ul class="nav">
                <li class="<?=($MenuSelected.$MenuItemActive == 'useradd')?'active':''?>"><a href="/administration/user/add">Создать</a></li>
                <li class="<?=($MenuSelected.$MenuItemActive == 'userpreview')?'active':''?>"><a href="/administration/user/preview">Просмотр</a></li>
                <li class="<?=($MenuSelected.$MenuItemActive == 'useredit')?'active':''?>"><a href="/administration/user/edit">Редактировать</a></li>
            </ul>
        </li>
        <li class="jsOnClick_submenu <?=($MenuSelected == 'persons')?'selected':''?>"><a href="#">Адресная книга</a><div class="ico">&nbsp;</div>
            <ul class="nav">
                <li class="<?=($MenuSelected.$MenuItemActive == 'personsadd')?'active':''?>"><a href="/administration/person/add">Создать</a></li>
                <li class="<?=($MenuSelected.$MenuItemActive == 'personspreview-cache-station')?'active':''?>"><a href="/administration/person/preview-cache-station">Просмотр (кэш станции)</a></li>
                <li class="<?=($MenuSelected.$MenuItemActive == 'personspreview-cache')?'active':''?>"><a href="/administration/person/preview-cache">Просмотр (часто используемые)</a></li>
                <li class="<?=($MenuSelected.$MenuItemActive == 'personspreview')?'active':''?>"><a href="/administration/person/preview">Просмотр (все)</a></li>
                <li class="<?=($MenuSelected.$MenuItemActive == 'personsedit')?'active':''?>"><a href="/administration/person/edit">Редактировать</a></li>
                <li class="<?=($MenuSelected.$MenuItemActive == 'personssettings')?'active':''?>"><a href="/administration/person/settings">Настройки</a></li>
            </ul>
        </li>
    </ul>

    <ul class="nav">
        <li>Поиск</li>
        <li class="jsOnClick_submenu <?=($MenuItemActive == 'htd')?'active':''?>"><a href="/search/package/htd">Поиск по ДТД</a><div class="ico">&nbsp;</div></li>
        <li class="jsOnClick_submenu <?=($MenuSelected == 'search')?'selected':''?>"><a href="#">Расширенный</a><div class="ico">&nbsp;</div>
            <ul class="nav">
                <li class="<?=($MenuSelected.$MenuItemActive == 'searchpackage')?'active':''?>"><a href="/search/full/package">Посылки</a></li>
                <li class="<?=($MenuSelected.$MenuItemActive == 'searchusers')?'active':''?>"><a href="/search/full/users">Пользователи</a></li>
                <li class="<?=($MenuSelected.$MenuItemActive == 'searchstations')?'active':''?>"><a href="/search/full/stations">Станции</a></li>
            </ul>
        </li>
    </ul>
</div>






<div class="content-left_column col-xs-12 col-sm-3 col-md-2" style="display: none;">
    <ul class="nav">
        <li>Настройки</li>
        <li class="jsOnClick_submenu"><a href="#">Личные данные</a><div class="ico">&nbsp;</div></li>
        <li class="jsOnClick_submenu"><a href="#">По умолчанию</a><div class="ico">&nbsp;</div></li>
        <li class="jsOnClick_submenu"><a href="/auth/logout">Выход</a><div class="ico">&nbsp;</div></li>
    </ul>
</div>







<div class="content-left_column col-xs-12 col-sm-3 col-md-2" style="display: none;">
    <ul class="nav">
        <li>Сообщения</li>
        <li class="jsOnClick_submenu"><a href="#">Входящие</a><div class="ico">&nbsp;</div></li>
        <li class="jsOnClick_submenu"><a href="#">Исходящие</a><div class="ico">&nbsp;</div></li>
        <li class="jsOnClick_submenu"><a href="#">Написать</a><div class="ico">&nbsp;</div></li>
    </ul>
</div>
                    
                    

                        <div class="content-right_column col-sm-offset-3 col-md-offset-2">
                        
                        

<div class="page_name">
    <span>Редактирование роли</span>
</div>

<?php foreach ($messages as $item) { ?>
    
    <div class="alert fade in <?php echo $item['class']; ?>">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <?php echo $item['text']; ?>
    </div>
    
<?php } ?>

<form method="post" enctype="multipart/form-data">

<?php if (isset($RoleRites)) { ?>

<table width="100%" class="table_content">
<tbody>

    <tr>
        <td>

            <div class="panel_1 active">
                
                <div class="panel_header">
                    <div class="panel_name">
                        <span>Изменение роли</span>
                    </div>
                </div><!--.panel_header-->
                
                <div class="panel_content">
                    <input type="hidden" name="id" value="<?php echo $RoleRites['role']['id']; ?>">
                    <div class="block_width_100">
                        <input type="text" name="name" placeholder="Название" value="<?php echo $RoleRites['role']['name']; ?>" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                    </div>
                    <div class="block_width_100">
                        <input type="text" name="description" placeholder="Описание" value="<?php echo $RoleRites['role']['description']; ?>" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                    </div>
                    
                    <br>
                    
                    <div class="block_width_100">
                        <table width="100%" class="admin_role-add table-list_grid">
                        <tbody>
                            <tr>
                                <th align="center"><span>Вкл./Выкл.</span></th>
                                <th><span>Название функции</span></th>
                                <th align="center"><span>Добавление</span></th>
                                <th align="center"><span>Изменение</span></th>
                                <th align="center"><span>Удаление</span></th>
                            </tr>
                            <tr>
                                <td align="center">
                                    <?php $package_add_file = ''; ?>
                                    <?php if (isset($RoleRites['right']['package_add_file'])) { ?>
                                    <?php $package_add_file = $RoleRites['right']['package_add_file']['description']; ?>
                                    <input type="hidden" name="rights[package_add_file][id]" value="<?php echo $RoleRites['right']['package_add_file']['id']; ?>">
                                    <?php } ?>
                                    <input type="checkbox" name="rights[package_add_file][-sel]" id="right_selected_0" class="trigger" <?php if ($this->isIncluded('sel', $package_add_file)) { ?> checked <?php } ?>>
                                    <label for="right_selected_0">&nbsp;</label>
                                </td>
                                <td>
                                    <span>Посылки. Приём. Из файла.</span>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[package_add_file][-add]" id="right_add_0" <?php if ($this->isIncluded('add', $package_add_file)) { ?> checked <?php } ?>>
                                    <label for="right_add_0">&nbsp;</label>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[package_add_file][-edit]" id="right_edit_0" <?php if ($this->isIncluded('edit', $package_add_file)) { ?> checked <?php } ?>>
                                    <label for="right_edit_0">&nbsp;</label>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[package_add_file][-delete]" id="right_delete_0" <?php if ($this->isIncluded('delete', $package_add_file)) { ?> checked <?php } ?>>
                                    <label for="right_delete_0">&nbsp;</label>
                                </td>
                            </tr>
                            
                            <tr>
                                <td align="center">
                                    <?php $package_add_register = ''; ?>
                                    <?php if (isset($RoleRites['right']['package_add_register'])) { ?>
                                    <?php $package_add_register = $RoleRites['right']['package_add_register']['description']; ?>
                                    <input type="hidden" name="rights[package_add_register][id]" value="<?php echo $RoleRites['right']['package_add_register']['id']; ?>">
                                    <?php } ?>
                                    <input type="checkbox" name="rights[package_add_register][-sel]" id="right_selected_1" class="trigger" <?php if ($this->isIncluded('sel', $package_add_register)) { ?> checked <?php } ?>>
                                    <label for="right_selected_1">&nbsp;</label>
                                </td>
                                <td>
                                    <span>Посылки. Приём. С регистрацией.</span>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[package_add_register][-add]" id="right_add_1" <?php if ($this->isIncluded('add', $package_add_register)) { ?> checked <?php } ?>>
                                    <label for="right_add_1">&nbsp;</label>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[package_add_register][-edit]" id="right_edit_1" <?php if ($this->isIncluded('edit', $package_add_register)) { ?> checked <?php } ?>>
                                    <label for="right_edit_1">&nbsp;</label>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[package_add_register][-delete]" id="right_delete_1" <?php if ($this->isIncluded('delete', $package_add_register)) { ?> checked <?php } ?>>
                                    <label for="right_delete_1">&nbsp;</label>
                                </td>
                            </tr>
                            
                            
                            <tr>
                                <td align="center">
                                    <?php $package_add_one = ''; ?>
                                    <?php if (isset($RoleRites['right']['package_add_one'])) { ?>
                                    <?php $package_add_one = $RoleRites['right']['package_add_one']['description']; ?>
                                    <input type="hidden" name="rights[package_add_one][id]" value="<?php echo $RoleRites['right']['package_add_one']['id']; ?>">
                                    <?php } ?>
                                    <input type="checkbox" name="rights[package_add_one][-sel]" id="right_selected_2" class="trigger" <?php if ($this->isIncluded('sel', $package_add_one)) { ?> checked <?php } ?>>
                                    <label for="right_selected_2">&nbsp;</label>
                                </td>
                                <td>
                                    <span>Посылки. Приём. Единичынй.</span>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[package_add_one][-add]" id="right_add_2" <?php if ($this->isIncluded('add', $package_add_one)) { ?> checked <?php } ?>>
                                    <label for="right_add_2">&nbsp;</label>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[package_add_one][-edit]" id="right_edit_2" <?php if ($this->isIncluded('edit', $package_add_one)) { ?> checked <?php } ?>>
                                    <label for="right_edit_2">&nbsp;</label>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[package_add_one][-delete]" id="right_delete_2" <?php if ($this->isIncluded('delete', $package_add_one)) { ?> checked <?php } ?>>
                                    <label for="right_delete_2">&nbsp;</label>
                                </td>
                            </tr>
                            
                            
                            <tr>
                                <td align="center">
                                    <?php $report_create = ''; ?>
                                    <?php if (isset($RoleRites['right']['report_create'])) { ?>
                                    <?php $report_create = $RoleRites['right']['report_create']['description']; ?>
                                    <input type="hidden" name="rights[report_create][id]" value="<?php echo $RoleRites['right']['report_create']['id']; ?>">
                                    <?php } ?>
                                    <input type="checkbox" name="rights[report_create][-sel]" id="right_selected_3" class="trigger" <?php if ($this->isIncluded('sel', $report_create)) { ?> checked <?php } ?>>
                                    <label for="right_selected_3">&nbsp;</label>
                                </td>
                                <td>
                                    <span>Создание отчётов.</span>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[report_create][-add]" id="right_add_3" <?php if ($this->isIncluded('add', $report_create)) { ?> checked <?php } ?>>
                                    <label for="right_add_3">&nbsp;</label>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[report_create][-edit]" id="right_edit_3" <?php if ($this->isIncluded('edit', $report_create)) { ?> checked <?php } ?>>
                                    <label for="right_edit_3">&nbsp;</label>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[report_create][-delete]" id="right_delete_3" <?php if ($this->isIncluded('delete', $report_create)) { ?> checked <?php } ?>>
                                    <label for="right_delete_3">&nbsp;</label>
                                </td>
                            </tr>
                            
                        </tbody>
                        </table>
                    </div>
                    
                    
                </div><!--.panel_content-->
                
                <div class="panel_bottom"></div><!--.panel_bottom-->
                
            </div><!--.panel_1-->
            
        </td>
    </tr>
    <tr>
        <td>
            <div class="block_width_100">
                <input type="submit" name="role_submit" value="Сохранить">
            </div>
        </td>
    </tr>
</tbody>
</table>

<?php } ?>


<?php if (isset($RolesAll)) { ?>

<table width="100%" class="table_content">
<tbody>
    <tr>
        <td width="100%">
            <div class="input-select">
                <input name="role_id" value="" type="hidden">
                <input placeholder="Роли" value="" class="jsOnChange_input" readonly="readonly" autocomplete="off" type="text">
                <div class="list-select">
                    <?php foreach ($RolesAll as $item) { ?>
                    <div class="item" data-id="<?php echo $item['id']; ?>" data-name=" <?php echo $item['name']; ?> (<?php echo $item['from_users']; ?>) ">
                        <span> <?php echo $item['name']; ?> (<?php echo $item['from_users']; ?>) <small><?php echo $item['description']; ?></small> </span>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </td>
        <td>
            <input type="submit" name="role_submit" value="Перейти">
        </td>
    </tr>
</tbody>
</table>

<?php } ?>

</form>



                        </div>
                    </div>
                </div>
            </div><!--.content-->
        </div><!--.main-->
    </body>
</html>
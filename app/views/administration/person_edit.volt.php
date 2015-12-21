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
    var t = $('#blocked_0');
    t.bind('change',function(){
        if(this.checked)
        {
            $(this).parent().find('label[for="blocked_0"] .true').show();
            $(this).parent().find('label[for="blocked_0"] .false').hide();
        }else{
            $(this).parent().find('label[for="blocked_0"] .true').hide();
            $(this).parent().find('label[for="blocked_0"] .false').show();
        }
    });
    t.trigger('change');
    var t = $('#date_on_delete_0');
    t.bind('change',function(){
        if(this.checked)
        {
            $(this).parent().find('label[for="date_on_delete_0"] .true').show();
            $(this).parent().find('label[for="date_on_delete_0"] .false').hide();
        }else{
            $(this).parent().find('label[for="date_on_delete_0"] .true').hide();
            $(this).parent().find('label[for="date_on_delete_0"] .false').show();
        }
    });
    t.trigger('change');
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
    <span>Редактирование профиля пользователя</span>
</div>

<?php foreach ($messages as $item) { ?>
    
    <div class="alert fade in <?php echo $item['class']; ?>">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <?php echo $item['text']; ?>
    </div>
    
<?php } ?>

<form method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $User['id']; ?>">

<?php if (isset($User)) { ?>

<table width="100%" class="table_content">
<tbody>

    <tr>
        <td>

            <div class="panel_1 active">
                
                <div class="panel_header">
                    <div class="panel_name">
                        <span>Изменение профиля</span>
                    </div>
                </div><!--.panel_header-->
                
                <div class="panel_content">
                    
                    <div class="block_width_50">
                        
                        <p class="font_style_1">Основные данные</p>
                        <div class="block_width_100">
                            <input type="text" name="last_name" placeholder="Фамилия" value="<?php echo $User['last_name']; ?>" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        <div class="block_width_50">
                            <input type="text" name="first_name" placeholder="Имя" value="<?php echo $User['first_name']; ?>" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        <div class="block_width_50">
                            <input type="text" name="middle_name" placeholder="Отчество" value="<?php echo $User['middle_name']; ?>" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        <div class="block_width_50">
                            <div class="input-select">
                                <input name="station_id" value="<?php echo $User['station_id']; ?>" type="hidden">
                                <input type="text" placeholder="Станция" value="<?php echo $User['station_name']; ?>" class="jsOnChange_input" readonly="readonly" autocomplete="off">
                                <div class="list-select">
                                    <?php foreach ($StationsAll as $item_station) { ?>
                                    <div class="item" data-id="<?php echo $item_station['id']; ?>" data-name="<?php echo $item_station['name']; ?>">
                                        <span><?php echo $item_station['name']; ?></span>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="block_width_50">
                            <div class="input-select">
                                <input name="role_id" value="<?php echo $User['role_id']; ?>" type="hidden">
                                <input type="text" placeholder="Роль" value="<?php echo $User['role_name']; ?>" class="jsOnChange_input" readonly="readonly" autocomplete="off">
                                <div class="list-select">
                                    <?php foreach ($RolesAll as $item_role) { ?>
                                    <div class="item" data-id="<?php echo $item_role['id']; ?>" data-name="<?php echo $item_role['name']; ?> ">
                                        <span><?php echo $item_role['name']; ?> </span>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        
                        <p class="font_style_1">Авторизационные данные</p>
                        <div class="block_width_50">
                            <input type="text" name="e_mail" placeholder="e-mail" value="<?php echo $User['e_mail']; ?>" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        <div class="block_width_50">
                            <input type="text" name="password" placeholder="Пароль" value="<?php echo $User['password']; ?>" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        
                        <p class="font_style_1">Отмечен удалённым</p>
                        <div class="block_width_100">
                            <input type="checkbox" name="date_on_delete" id="date_on_delete_0" class="trigger" <?php if ($User['date_on_delete']) { ?> checked <?php } ?>>
                            <label for="date_on_delete_0">
                                <span class="false">Аккаунт в активеном состоянии</span>
                                <span class="true">Аккаунт не удалён, но помечен как удаленный</span>
                            </label>
                            <div class="clear_float"></div>
                        </div>
                        
                    </div><!--.block_width_50-->
                    
                    <div class="block_width_50">
                        
                        <p class="font_style_1">Единицы измерения</p>
                        <div class="block_width_100">
                            <div class="input-select">
                                <input name="unit_id1" value="<?php echo $User['unit_id1']; ?>" type="hidden">
                                <input type="text" placeholder="Длина" value="<?php echo $User['unit_name1']; ?>" class="jsOnChange_input" readonly="readonly" autocomplete="off">
                                <div class="list-select">
                                    <?php foreach ($Units1 as $item_unit) { ?>
                                    <div class="item" data-id="<?php echo $item_unit['id']; ?>" data-name="<?php echo $item_unit['short_name']; ?> (<?php echo $item_unit['name']; ?>)">
                                        <span><?php echo $item_unit['short_name']; ?> (<?php echo $item_unit['name']; ?>)</span>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="block_width_100">
                            <div class="input-select">
                                <input name="unit_id2" value="<?php echo $User['unit_id2']; ?>" type="hidden">
                                <input type="text" placeholder="Вес" value="<?php echo $User['unit_name2']; ?>" class="jsOnChange_input" readonly="readonly" autocomplete="off">
                                <div class="list-select">
                                    <?php foreach ($Units2 as $item_unit) { ?>
                                    <div class="item" data-id="<?php echo $item_unit['id']; ?>" data-name="<?php echo $item_unit['short_name']; ?> (<?php echo $item_unit['name']; ?>)">
                                        <span><?php echo $item_unit['short_name']; ?> (<?php echo $item_unit['name']; ?>)</span>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="block_width_100">
                            <div class="input-select">
                                <input name="unit_id3" value="<?php echo $User['unit_id3']; ?>" type="hidden">
                                <input type="text" placeholder="Коллич." value="<?php echo $User['unit_name3']; ?>" class="jsOnChange_input" readonly="readonly" autocomplete="off">
                                <div class="list-select">
                                    <?php foreach ($Units3 as $item_unit) { ?>
                                    <div class="item" data-id="<?php echo $item_unit['id']; ?>" data-name="<?php echo $item_unit['short_name']; ?> (<?php echo $item_unit['name']; ?>)">
                                        <span><?php echo $item_unit['short_name']; ?> (<?php echo $item_unit['name']; ?>)</span>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        
                        <p class="font_style_1">Системные настройки</p>
                        <div class="block_width_50">
                            <div class="input-select">
                                <input name="language_id" value="<?php echo $User['language_id']; ?>" type="hidden">
                                <input type="text" placeholder="Язык" value="<?php echo $User['language_name']; ?>" class="jsOnChange_input" readonly="readonly" autocomplete="off">
                                <div class="list-select">
                                    <?php foreach ($LanguagesAll as $item_language) { ?>
                                    <div class="item" data-id="<?php echo $item_language['id']; ?>" data-name="<?php echo $item_language['name']; ?>">
                                        <span><?php echo $item_language['name']; ?></span>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="block_width_50">
                            <div class="input-select">
                                <input name="currency_id" value="<?php echo $User['currency_id']; ?>" type="hidden">
                                <input type="text" placeholder="Валюта" value="<?php echo $User['currency_name']; ?>" class="jsOnChange_input" readonly="readonly" autocomplete="off">
                                <div class="list-select">
                                    <?php foreach ($CurrencyAll as $item_currency) { ?>
                                    <div class="item" data-id="<?php echo $item_currency['id']; ?>" data-name="<?php echo $item_currency['short_name']; ?> (<?php echo $item_currency['full_name']; ?>)">
                                        <span><?php echo $item_currency['short_name']; ?> (<?php echo $item_currency['full_name']; ?>)</span>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        
                        <p class="font_style_1">Блокировка аккаунта</p>
                        <div class="block_width_100">
                            <input type="checkbox" name="blocked" id="blocked_0" class="trigger" <?php if ($User['blocked']) { ?> checked <?php } ?>>
                            <label for="blocked_0">
                                <span class="false">Аккаунт в активеном состоянии</span>
                                <span class="true">Аккаунт заблокирован</span>
                            </label>
                            <div class="clear_float"></div>
                        </div>
                    </div>
                    
                    <div class="block_width_100">
                        <p class="font_style_1">Короткое описание</p>
                        <div class="block_width_100">
                            <input type="text" name="description" placeholder="Описание" value="<?php echo $User['description']; ?>" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                    </div>
                    
                </div><!--.panel_content-->
                
                <div class="panel_bottom"></div><!--.panel_bottom-->
                
            </div><!--.panel_1-->
            
            <br>
            <br>
            <br>
            
            <div class="panel_1 active">
                
                <div class="panel_header">
                    <div class="panel_name">
                        <span>Статистическая информация аккаунта пользователя</span>
                    </div>
                </div><!--.panel_header-->
                
                <div class="panel_content">
                    <div class="block_width_100">
                        <p><span class="font_style_1">Дата регистрации пользователя:</span> <span class="font_style_3"><?php echo $User['date_on_add']; ?></span></p>
                        <p><span class="font_style_1">Дата последних изменений профиля:</span> <span class="font_style_3"><?php echo $User['date_on_last_edit']; ?></span></p>
                        <p><span class="font_style_1">Дата последнего входа в систему:</span> <span class="font_style_3"><?php echo $User['date_on_last_login']; ?></span></p>
                        <p><span class="font_style_1">Дата последнего действия пользователя:</span> <span class="font_style_3"><?php echo $User['date_on_last_action']; ?></span></p>
                        <p><span class="font_style_1">Аккаунт помечен как удаленный:</span> <span class="font_style_3"><?php echo $User['date_on_delete']; ?></span></p>
                    </div>
                </div><!--.panel_content-->
                
                <div class="panel_bottom"></div><!--.panel_bottom-->
                
            </div><!--.panel_1-->
            
        </td>
    </tr>
    <tr>
        <td>
            <div class="block_width_100">
                <input name="send_user" id="send_user_0" type="checkbox">
                <label for="send_user_0"><span class="font_style_3">Отправить пользователю письмо о смене данных</span></label>
                <div class="clear_float"></div>
                <br>
                <input type="submit" name="submit" value="Сохранить">
            </div>
        </td>
    </tr>
</tbody>
</table>

<?php } ?>


<?php if (isset($UsersAll)) { ?>

<table width="100%" class="table_content">
<tbody>
    <tr>
        <td width="100%">
            <div class="input-select">
                <input name="user_id" value="" type="hidden">
                <input placeholder="Пользователи" value="" class="jsOnChange_input" readonly="readonly" autocomplete="off" type="text">
                <div class="list-select">
                    <?php foreach ($UsersAll as $item) { ?>
                    <div class="item" data-id="<?php echo $item['id']; ?>" data-name="<?php echo $item['last_name']; ?> <?php echo $item['first_name']; ?> <?php echo $item['middle_name']; ?> (<?php echo $item['role_name']; ?>)">
                        <span> <?php echo $item['last_name']; ?> <?php echo $item['first_name']; ?> <?php echo $item['middle_name']; ?> (<?php echo $item['role_name']; ?>) </span>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </td>
        <td>
            <input type="submit" name="submit" value="Перейти">
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
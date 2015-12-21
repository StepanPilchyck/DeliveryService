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
    var t = $('#airport_0');
    t.bind('change',function(){
        if(this.checked)
        {
            $('input[name="airport"]').removeAttr('disabled','');
        }else{
            $('input[name="airport"]').val('');
            $('input[name="airport"]').attr('disabled','');
        }
    });
    t.trigger('change');
    
    var t = $('#branch_office_0');
    t.bind('change',function(){
        if(this.checked)
        {
            $('input[name="branch_office"]').removeAttr('disabled','');
            $('input[name="branch_office"]').parent().find('.jsOnChange_input').removeAttr('disabled','');
        }else{
            $('input[name="branch_office"]').val('');
            $('input[name="branch_office"]').attr('disabled','');
            $('input[name="branch_office"]').parent().find('.jsOnChange_input').val('');
            $('input[name="branch_office"]').parent().find('.jsOnChange_input').attr('disabled','');
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
    <span>Редактирование станции</span>
</div>

<?php foreach ($messages as $item) { ?>
    
    <div class="alert fade in <?php echo $item['class']; ?>">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <?php echo $item['text']; ?>
    </div>
    
<?php } ?>

<form method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $Station['id']; ?>">

<?php if (isset($Station)) { ?>

<table width="100%" class="table_content">
<tbody>

    <tr>
        <td>

            <div class="panel_1 active">
                
                <div class="panel_header">
                    <div class="panel_name">
                        <span>Изменение станции</span>
                    </div>
                </div><!--.panel_header-->
                
                <div class="panel_content">
                    
                    <div class="block_width_50">
                        <div class="block_width_100">
                            <input type="text" name="name" placeholder="Название" value="<?php echo $Station['name']; ?>" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        <div class="block_width_100">
                            <input type="text" name="name_en" placeholder="Назв. (en)" value="<?php echo $Station['name_en']; ?>" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        <div class="block_width_100">
                            <input type="text" name="code" placeholder="Код" value="<?php echo $Station['code']; ?>" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        <div class="block_width_100">
                            <input type="text" name="address" placeholder="Адрес" value="<?php echo $Station['address']; ?>" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        <div class="block_width_100">
                            <input type="text" name="address_en" placeholder="Адр. (en)" value="<?php echo $Station['address_en']; ?>" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        <div class="block_width_100">
                            <div class="input-select">
                                <input name="country_id" value="<?php echo $Station['country_id']; ?>" type="hidden">
                                <input type="text" placeholder="Страна" value="<?php echo $Station['country_name']; ?>" class="jsOnChange_input" readonly="readonly" autocomplete="off">
                                <div class="list-select">
                                    <?php foreach ($CountriesAll as $item_country) { ?>
                                    <div class="item" data-id="<?php echo $item_country['id']; ?>" data-name="<?php echo $item_country['name']; ?>">
                                        <span><?php echo $item_country['name']; ?></span>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="block_width_100">
                            <div class="input-select">
                                <input name="station_status_id" value="<?php echo $Station['station_status_id']; ?>" type="hidden">
                                <input type="text" placeholder="Статус" value="<?php echo $Station['station_status_name']; ?>" class="jsOnChange_input" readonly="readonly" autocomplete="off">
                                <div class="list-select">
                                    <?php foreach ($StationsStatusAll as $item_status) { ?>
                                    <div class="item" data-id="<?php echo $item_status['id']; ?>" data-name="<?php echo $item_status['name']; ?>">
                                        <span><?php echo $item_status['name']; ?></span>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="block_width_50">
                        
                        <div class="block_width_50">
                            <input type="text" name="l" placeholder="Долгота" value="<?php echo $Station['l']; ?>" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        <div class="block_width_50">
                            <input type="text" name="w" placeholder="Широта" value="<?php echo $Station['w']; ?>" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        
                        <div class="block_width_100">
                            <input type="checkbox" name="airport_0" id="airport_0" class="trigger" <?php if ($Station['airport']) { ?> checked <?php } ?>>
                            <label for="airport_0">Наличие аэропорта</label>
                            <div class="clear_float"></div>
                        </div>
                        <div class="block_width_100">
                            <input type="text" name="airport" placeholder="Аэропорт" value="<?php echo $Station['airport']; ?>" class="jsOnKeyup animation_off">
                        </div>
                        
                        <div class="block_width_100">
                            <input type="checkbox" name="branch_office_0" id="branch_office_0" class="trigger" <?php if ($Station['branch_office']) { ?> checked <?php } ?>>
                            <label for="branch_office_0">Станция - филиал</label>
                            <div class="clear_float"></div>
                        </div>
                        
                        <div class="block_width_100">
                            <div class="input-select">
                                <input name="branch_office" value="<?php echo $Station['branch_office']; ?>" type="hidden">
                                <input type="text" placeholder="Станция" value="<?php echo $Station['branch_office_name']; ?>" class="jsOnChange_input animation_off" readonly="readonly" autocomplete="off">
                                <div class="list-select">
                                    <?php foreach ($Stations as $item_station) { ?>
                                    <div class="item" data-id="<?php echo $item_station['id']; ?>" data-name="<?php echo $item_station['name']; ?>">
                                        <span><?php echo $item_station['name']; ?></span>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="block_width_100">
                            <p><span class="font_style_1">Время хранение кэша адресной книги (в днях):</span></p>
                        </div>
                        
                        <div class="block_width_100">
                            <input type="text" name="ttl_persons_cache" placeholder="Кэш" value="<?php echo $Station['ttl_persons_cache']; ?>" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        
                    </div>
                    <div class="block_width_100">
                        <p><span class="font_style_1">Дата регистрации станции:</span> <span class="font_style_3"><?php echo $Station['date_on_add']; ?></span></p>
                        <p><span class="font_style_1">Дата последних изменений:</span> <span class="font_style_3"><?php echo $Station['date_on_last_edit']; ?></span></p>
                    </div>
                        
                    
                    
                </div><!--.panel_content-->
                
                <div class="panel_bottom"></div><!--.panel_bottom-->
                
            </div><!--.panel_1-->
            
        </td>
    </tr>
    <tr>
        <td>
            <div class="block_width_100">
                <input type="submit" name="submit" value="Сохранить">
            </div>
        </td>
    </tr>
</tbody>
</table>

<?php } ?>


<?php if (isset($StationsAll)) { ?>

<table width="100%" class="table_content">
<tbody>
    <tr>
        <td width="100%">
            <div class="input-select">
                <input name="station_id" value="" type="hidden">
                <input placeholder="Станции" value="" class="jsOnChange_input" readonly="readonly" autocomplete="off" type="text">
                <div class="list-select">
                    <?php foreach ($StationsAll as $item) { ?>
                    <div class="item" data-id="<?php echo $item['id']; ?>" data-name=" <?php echo $item['name']; ?> (<?php echo $item['country_name']; ?>) ">
                        <span> <?php echo $item['name']; ?> (<?php echo $item['country_name']; ?>) </span>
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
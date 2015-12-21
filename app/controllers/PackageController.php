<?php

class PackageController extends \Phalcon\Mvc\Controller
{
    public function initialize()
    {
        View::setJs($this);
        View::setCss($this);
        View::setMessages($this);
    }
    
    public function indexAction()
    {
        $this->view->disable();
        $this->response->redirect('/work', '/');
    }
    
    public function addAction($reception = null)
    {
        $this->view->setVar("TopMenuSelected", 'work');
        $this->view->setVar("MenuSelected", 'add');
        $this->view->setVar("MenuItemActive", $reception);
        if(!empty($reception))
        {
            $this->view->setVar("countries", References::getCountries());
            $this->view->setVar("currency", References::getCurrency());
            $this->view->setVar("units_1", References::getUnits(NULL, array(1))['units']);
            $this->view->setVar("units_34", References::getUnits(NULL, array(3,4))['units']);
            $this->view->setVar("date_on_reception_default", date('d-m-Y H:i:s'));
            $this->view->pick('/package/'. $reception);
            
            View::addJs($this, [
                '/js/async/jquery.tmpl.min.js',
                '/js/async/scripts_package_add.js',
                '/js/async/jquery.mb.browser.js',
                '/js/async/jquery.mousewheel.js',
                '/js/async/calendar_date-time.js'
            ]);
            
            View::addCss($this, ['/css/calendar_date-time.css']);
        }
        
        
        if($this->request->isPost())
        {
            
            $post = $this->request->getPost();
            $user_id = Users::getId($this);
            $station_id = Users::getStationId($this);
            
            $package_document = $post['cont_type'];
            if($package_document == '0')
            {
                $pcp = $post['pack_cont_pl'];

                $package_contents_places =array();

                for($i=0; $i<count($pcp); $i++)
                {
                    $pcpa = $pcp[$i]['att'];
                    $package_contents_place_attachments = array();
                    for($j=0; $j<count($pcpa); $j++)
                    {
                        $package_contents_place_attachments[] = array(
                            'description' => $pcpa[$j]['descr'],
                            'unit_count' => $pcpa[$j]['u_count'],
                            'units_id' => $pcpa[$j]['units'],
                            'unit_price' => $pcpa[$j]['price']
                        );
                    }

                    $package_contents_places[] = array(
                        'length' => $pcp[$i]['length'],
                        'width' => $pcp[$i]['width'],
                        'height' => $pcp[$i]['height'],
                        'units_id' => $post['pack_cont_pl_units'],//$pcp[$i]['units'],
                        'attachment' => $package_contents_place_attachments
                    );
                }

                $time_arr = explode (' ', $post['date_on_reception']);
                $date_arr = explode ('-', $time_arr[0]);
                $date_on_reception = $date_arr[2].'-'.$date_arr[1].'-'.$date_arr[0].' '.$time_arr[1];
                for($i=0; $i<count($post['package_rec_name']); $i++)
                {
                    for($j=0; $j<count($post['package_send_name']); $j++)
                    {
                        
                        $package_id = Package::addNotDocument(
                            $post['package_send_name'][$i],
                            $post['package_send_addr'][$i],
                            $post['package_send_country'][$i],
                            $post['package_rec_name'][$j],
                            $post['package_rec_addr'][$j],
                            $post['package_rec_country'][$j],
                            $station_id,
                            $post['pack_cont_descr_nd'],
                            $post['pack_cont_pl_count_nd'],
                            $post['pack_cont_weight_nd'],
                            $post['pack_cont_curr_nd'],
                            $package_contents_places,
                            $post['pack_cont_comm_nd'],
                            'null',
                            'null',
                            $post['package_send_phone'][$i],
                            $post['package_rec_phone'][$j],
                            $post['package_guar'],
                            $date_on_reception
                        );

                        /**/
                        $res = Package::setStatus(
                            $package_id[0]['package_add_all_not_document'],
                            2,
                            'true',
                            $user_id,
                            'null'
                        );
                        /**/
                    }
                }
            }else{
                for($i=0; $i<count($post['package_rec_name']); $i++)
                {
                    for($j=0; $j<count($post['package_send_name']); $j++)
                    {

                        $package_id = Package::addDocument(
                            $post['package_send_name'][$i],
                            $post['package_send_addr'][$i],
                            $post['package_send_country'][$i],
                            $post['package_rec_name'][$j],
                            $post['package_rec_addr'][$j],
                            $post['package_rec_country'][$j],
                            $station_id,
                            $post['pack_cont_descr_d'],
                            $post['pack_cont_pl_count_d'],
                            $post['pack_cont_weight_d'],
                            'null',
                            $post['pack_cont_comm_d'],
                            'null',
                            'null',
                            $post['package_send_phone'][$i],
                            $post['package_rec_phone'][$j],
                            $post['package_guar'],
                            $date_on_reception
                        );

                        /**/
                        $res = Package::setStatus(
                            $package_id[0]['package_add_all_document'],
                            2,
                            'true',
                            $user_id,
                            'null'
                        );
                        /**/
                    }
                }
            }
            //$this->response->redirect('/search/full/package', '/');
            
            //$this->view->setVar("test", $package_id);
        }
    }
}
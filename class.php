<?php
class TimeLine
    public function Service(){

        $service = array(
            array('msg' => ' elements that are used to trigger in-page functionality (like collapsing content), rather than linking to new pages or sections within the current page, these links should be given a', 'date' => '2017-01-11'),
            array('msg' => 'hello2', 'date' => '2017-01-10'),
            array('msg' => 'I want to know more about PHP', 'date' => '2017-01-16'),
            array('msg' => 'hello3', 'date' => '2017-01-09'),
            array('msg' => 'hello4', 'date' => '2017-01-08'),
            array('msg' => 'hello5', 'date' => '2017-01-07'),
            array('msg' => 'hello6', 'date' => '2017-01-06'),
            array('msg' => 'hello7', 'date' => '2017-01-05'),
            array('msg' => 'hello8', 'date' => '2017-01-04'),
            array('msg' => 'hello9', 'date' => '2017-01-03'),
            array('msg' => 'hello10', 'date' => '2017-01-02'),
            array('msg' => 'hello11', 'date' => '2017-01-01')
        );
        usort($service, function($a, $b) {
            if($a['date']==$b['date']) return 0;
            return $a['date'] < $b['date']?1:-1;
        });
        return $service;

    }
    public function getPage($page=''){
        $service=$this->Service();
        $totalData=count($service);
        $perPage=5;
        $totalPage = ceil($totalData / $perPage);
        if ($page!='') {
            $page = $page;
            if ($page <= 0)
                $page = 1;
            if ($page >= $totalData)
                $page = $totalPage;
        }
        else {
            $page = 1;
        }

        $startPage=($page*5)-5;
        $start = ($page - 1) * $perPage;
        $limitService=array_slice($service,$startPage,$perPage);
        return $data=array('service' => $limitService, 'page' => $page,'totalPage'=>$totalPage);




    }

}
?>
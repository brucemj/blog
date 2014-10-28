<?php
//header("Content-type: text/html; charset=utf-8"); 

Class IndexAction extends Action {
    Public function index(){
        $this->display();
    }

    Public function listCata(){
        $this->cat = M('cat')->select();
        $this->display();
    }

    Public function addCata(){
        $this->pid = I('pid', 0, 'intval');
        $this->display();
    }

    Public function addCataAction(){        
        /*
        //header("Content-type: text/html; charset=utf-8"); 
        //p(I('post.'));
        //die;
        $link = mysql_connect('172.21.12.58', 'root', 'root');
        $query = 'show variables like "character%"';
        $result = mysql_query($query);
        p($result);
        echo  "<table>\n" ;
        while ( $line  =  mysql_fetch_array ( $result ,  MYSQL_ASSOC )) {
            echo  "\t<tr>\n" ;
            foreach ( $line  as  $col_value ) {
                echo  "\t\t<td> $col_value </td>\n" ;
            }
            echo  "\t</tr>\n" ;
        }
        echo  "</table>\n" ;

        //die;
        */
        $db = M('cat');
        if ( $db->add(I('post.')) ){
            $this->redirect(GROUP_NAME . '/Index/listCata');
        }else{
            $this->error('添加失败');
        }
    }

    Public function delCataAction(){
        $id = I('id');        ;
        if ( M('cat')->where(array('id' => $id))->delete() ){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }

    Public function addSort(){
        $db = M('cat');
        foreach ($_POST as $id => $sort) {
            $db->where(array('id' => $id))->setField('sort', $sort);
        }
        $this->redirect(GROUP_NAME . '/Index/listCata');
    }
}

?>

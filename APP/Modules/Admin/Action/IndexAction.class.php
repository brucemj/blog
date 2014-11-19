<?php
header("Content-type: text/html; charset=utf-8"); 

Class IndexAction extends Action {
    Public function index(){
        $this->display();
    }

    Public function listCata(){
        $cat = M('cat')->order('sort ASC')->select();
        import('Class/Category', APP_PATH);
        $cats = Category::unlimitedForLevel($cat);
        
        $this->cat = $cats;
        $this->display();
    }

    Public function addCata(){
        $this->pid = I('pid', 0, 'intval');
        $this->display();
    }

    Public function addAttr(){
        $this->pid = I('pid', 0, 'intval');
        $this->display();
    }

    Public function addCataAction(){
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

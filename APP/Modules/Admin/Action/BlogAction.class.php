<?php
Class BlogAction extends Action{
	Public function index(){
		$this->display();
	}

	public function blog(){
		$cat = M('cat')->order('sort ASC')->select();
        import('Class/Category', APP_PATH);

        $this->cat = Category::unlimitedForLevel($cat);
        $this->attr = M('attr')->select();
		$this->display();
	}

	public function addBlog(){
		
	}

}

?>
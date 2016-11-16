<?php

class Node{
	/**
	 * @param $element 节点数据
	 * @param $next  指向下一个节点的链接
	 * @var unknown
	 */
	public $element;
	public $next;
    public function __construct($element){
    	$this->element = $element;
    	$this->next = null;
    }
}

class LinkedList{
	private $head;
    public function __construct(){
    	$this->head = new Node("head");
    }	
    
    public function find($item){
    	$currNode = $this->head;
    	while ($currNode->element != $item){
    		$currNode = $currNode->next;
    	}
    	return $currNode;
    }
}
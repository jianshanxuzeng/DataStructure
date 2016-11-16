<?php
class Queue {
	private $dataStore;
	public $length;
	public function __construct() {
		$this->dataStore = array ();
		$this->length = 0;
	}
	// 进队
	public function enqueue($element) {
		array_push ( $this->dataStore, $element );
		$this->length ++;
		// print_r($this->dataStore);
	}
	// 出队(删除队首元素)
	public function dequeue() {
		//code 优先权 越大优先权越高
		$priority = $this->dataStore[0]->code;
		$i = 0;
		foreach ($this->dataStore as $key => $value){
			if ($value->code > $priority ){
				$priority = $value->code;
				$i = $key;
			}
		}
		$queue = array_splice($this->dataStore,$i,1);
		$this->length --;
		return $queue;
	}
	// 读取队头元素
	public function front() {
		return $this->dataStore [0];
	}
	// 读取队尾元素
	public function back() {
		return $this->dataStore [count ( $this->dataStore ) - 1];
	}
	// 显示队列的所有元素
	public function toString() {
		$retStr = " ";
		foreach ( $this->dataStore as $value ) {
			$retStr .= $value->name . "\n";
		}
		return $retStr;
	}
	// 判断队列是否为空
	public function emptyQueue() {
		return $this->length == 0 ? true : false;
	}
}
class Patient{
	public  $name;
	public  $code;
	public function __construct($name,$code){
		$this->name = $name;
		$this->code = $code;
	}
}

$q = new Queue();
$q->enqueue(new Patient("zhangsan", 1));
$q->enqueue(new Patient("lisi", 3));
$q->enqueue(new Patient("wangwu", 2));
$q->enqueue(new Patient("mazi", 2));
$q->enqueue(new Patient("Mr Lin", 1));
$q->enqueue(new Patient("Mr An", 3));

print_r($q->toString());
echo "=========1========";
$q->dequeue();
print_r($q->toString());
echo "=======2==========";
$q->dequeue();
print_r($q->toString());
echo "========3=========";
$q->dequeue();
print_r($q->toString());
echo "========4=========";
$q->dequeue();
print_r($q->toString());
echo "=======5==========";
$q->dequeue();
print_r($q->toString());




// $q = new Queue ();
// $q->enqueue ( "Hello" );
// $q->enqueue ( "world" );
// $q->enqueue ( "!" );
// echo $q->toString ();
// $q->dequeue ();
// echo $q->toString ();
// echo "Front of queue: " . $q->front () . "\n";
// echo "Back of queue: " . $q->back () . "\n";
// echo "the queue length is : " . $q->length;





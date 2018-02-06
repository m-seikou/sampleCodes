<?php
/**
 * @see http://php.net/manual/ja/book.gmp.php
 */
class dh {
	const BASE = 16;
	/** @var GMP $p */
	private $p;
	/** @var GMP $g */
	private $g;
	/** @var GMP $r */
	private $r;
	
	public function __construct(string $p,string $g) {
		$this->p = gmp_init($p, self::BASE);
		$this->g = gmp_init($g, self::BASE);
		$this->r = gmp_random_range(0,gmp_sub($this->p, 2));
	}
	
	public function getPablic(){
		return gmp_strval(gmp_powm ( $this->g , $this->r ,  $this->p ),  self::BASE);
	}
	
	public function getKey(string $public){
		return gmp_strval(gmp_powm ( gmp_init($public, self::BASE) , $this->r ,  $this->p ),  self::BASE);
	}
}

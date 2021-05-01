<?php

class view {

	// method declarations
	public function build_head($connection, $request_uri) {

		$file = file_get_contents('partials/head.html');

		return	$file;
	}

	public function build_body($connection, $request_uri) {

		$file = file_get_contents('partials/body.html');

		return	$file;
	}

	public function build_footer($connection, $request_uri) {

		$file = file_get_contents('partials/footer.html');

		return	$file;
	}


	public function load($connection, $request_uri) {

		$build = "";

		$build = $build . $this->build_head($connection, $request_uri);

		$build = $build . $this->build_body($connection, $request_uri);

		$build = $build . $this->build_footer($connection, $request_uri);

		echo $build;
	}
}

?>

#!/usr/bin/php
<?php
	function get_html($url) {
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$html = curl_exec($ch);
		curl_close($ch);
		return ($html);
	}
	function get_imgs($html) {
		$imgs;
		preg_match_all("/<img(?:.*?)>/i", $html, $imgs);
		return ($imgs[0]);
	}
	function mkdir2($dir) {
		if (!file_exists($dir)) {
			return (mkdir($dir));
		}
		return (true);
	}
	function download_img($base, $url, $filename) {
		if (!preg_match("/https?\:\/\//", $url))
			$url = $base . $url;
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$data = curl_exec($ch);
		curl_close($ch);
		file_put_contents($filename, $data);
	}
	function get_filename($url) {
		$matches;
		preg_match("/(?:.*)\/([^\?]+)/", $url, $matches);
		return ($matches[1]);
	}
	function get_outdir($url) {
		$matches;
		preg_match("/https?:\/\/(.*?)\//i", $url, $matches);
		return $matches[1];
	}
	if (isset($argv[1])) {
		if (($html = get_html($argv[1])) != null) {
			$outdir = get_outdir($argv[1]);
			$imgs = get_imgs($html);
			$pattern = "/src=[\"|\'](.*?)[\"|\']/i";
			if (mkdir2($outdir)) {
				foreach ($imgs as $img) {
					$data;
					if (preg_match($pattern, $img, $data)) {
						download_img($argv[1], $data[1], "$outdir/" . get_filename($data[1]));
					}
				}
			}
		}
	}
?>

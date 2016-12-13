<?php

/*
* Plugin Name: Blooom Calculator
* Description: Calculate blooom 401k. Usage: put shortcode <strong>[blooom-calculator]</strong> anywhere on page
* Version: 1.2
* Author: Digitalnoir
* Author URI: http://www.digital-noir.com

*/





add_shortcode( 'blooom-calculator', 'bloom_calculator_render' );

function bloom_calculator_render($atts, $content = "") {

	wp_enqueue_style( 'bc-style-google-fonts', 'https://fonts.googleapis.com/css?family=Raleway:400,200,300,700,600,500|Fjalla+One' );

	wp_enqueue_style( 'bc-style-bootstrap', plugins_url( '/css/bootstrap.min.css',__FILE__),'','1.2' );

	wp_enqueue_style( 'bc-style-calculator', plugins_url( '/style-calculator.css',__FILE__),'','1.2' );

	

	wp_enqueue_script( 'bc-js-ui-custom', plugins_url( '/js/jquery-ui.min.js',__FILE__), array('jquery'),'','1.2' );

	wp_enqueue_script( 'bc-js-plugins', plugins_url( '/js/plugins.js',__FILE__), array('jquery'),'','1.2' );

	wp_enqueue_script( 'bc-js-main', plugins_url( '/js/main.js',__FILE__), array('jquery'),'','1.2' );





extract(shortcode_atts(array(

		'class' => '',

	), $atts));



	$o 	= '';

	$o .= '<div class="page-wrapper calculator-shortcode-wrapper">

							<div class="calc-hero row">

								<div class="col-md-8 col-sm-10 col-md-offset-2 col-sm-offset-1 text-center">

									<div class="logo-calc"><img src="'.plugins_url('/img/calc-logo.png',__FILE__).'" width="38" height="26" alt=""><span>blooom\'s</span></div>

									<h1>401k calculator</h1>

									If you are looking for 401k help, you are at the right place. At blooom we keep things simple. <br>

									And if you think this calculator is easy to use, you should see just <br>

									how easy it is to have us <strong>manage your 401k for you!</strong> </div>

							</div>

							<div class="calc-con row">

								<div class="col-md-6 col-sm-12">

									<form id="calculator" class="form-holder">

										<div class="years fieldset-container text-center">

											<label>Years Until Retirement</label>

											<div class="data-min data">0 YRS</div>

											<div class="data-max data">50 YRS</div>

											<div id="slider-years" class="slider" data-min="0" data-max="50" data-step="1"></div>

											<input type="text" class="calculate-input input-slider" id="year-retire" name="year" autocomplete="off" value="0"/>

										</div>

										<div class="current-balance fieldset-container">

											<label for="current-balance">Current 401K Balance</label>

											<div class="field">

												<div class="prepend">$</div>

												<input type="text" pattern="[0-9]*" class="calculate-input input-money" id="current-balance" name="current" autocomplete="off" placeholder="TYPE HERE.."/>

											</div>

										</div>

										<div class="yearly-savings fieldset-container">

											<label for="yearly-saving">Yearly Savings</label>

											<div class="field">

												<div class="prepend">$</div>

												<input type="text" pattern="[0-9]*" class="calculate-input input-money" id="yearly-saving" name="saving" autocomplete="off" placeholder="TYPE HERE.."/>

											</div>

										</div>

										<div class="interest fieldset-container text-center">

											<label>Expected Rate of Return</label>

											<div class="data-min data">0%</div>

											<div class="data-max data">12%</div>

											<div id="slider-interest" class="slider percent-data" data-min="0" data-max="12" data-step="0.1"></div>

											<input type="text" class="calculate-input input-slider" id="interest" name="interest" autocomplete="off" value="1"/>

										</div>

									</form>

								</div>

								<div class="col-md-6 col-sm-12">

									<div class="results-holder">

										<div class="result-amount">

											<div class="title"> <span class="line-1">A professionally managed 401k</span> <span class="line-2">Increases more</span> <span class="line-3">than one that is self-managed</span> </div>

											<div class="bloom-result-container the-results"> <span class="bullet-top"></span> <span class="line-top"></span>

												<div class="clearfix" style="display:block;width:100%"></div>

												<div class="bloom-title">

													<div class="inner-title">Your 401k with<br/> pro help</div>

													<div id="bloom-results" class="results"></div>

													<img src="'.plugins_url('/img/bloom-logo.png',__FILE__ ).'" width="37" height="43" alt="" class="logo-bloom" /> </div>

											</div>

											<div class="common-result-container the-results"> <span class="bullet-top"></span> <span class="line-top"></span>

												<div class="clearfix" style="display:block;width:100%"></div>

												<div class="bloom-title">

													<div class="inner-title">Your 401k</div>

													<div id="common-results" class="results"></div>

												</div>

											</div>

										</div>

										<div class="result-placeholder">

											<div class="hero"> <img src="'.plugins_url('/img/bloom-logo.png',__FILE__).'" width="37" height="43" alt="" /><br>

												Fill in your details and see what

												<h3>blooom can do for you</h3>

											</div>

										</div>

										<img src="'.plugins_url('/img/result-placholder.png',__FILE__).'" alt="" /> </div>

								</div>

							</div>

					</div>';

	

	return $o;

}







?>
jQuery(function($) {

	

	"use strict"



  $(document).ready(function(e) {

    function calculateInterest() {

      var current_balance = $('#current-balance').val() != '' ? parseFloat($('#current-balance').val()) : 0,

        expected_ratio = parseFloat($('#interest').val()) / 100,

        year = parseFloat($('#year-retire').val()),

        yearly_saving = $('#yearly-saving').val() != '' ? parseFloat($('#yearly-saving').val()) : 0;

				

      var c401k = current_balance * Math.pow((1 + expected_ratio), year);

      var saving = (yearly_saving / expected_ratio) * (Math.pow((1 + expected_ratio), year) - 1)

			

			var c401k_half = current_balance * Math.pow((1 + (expected_ratio / 2)), year);

      var saving_half = (yearly_saving / (expected_ratio / 2)) * (Math.pow((1 + (expected_ratio / 2)), year) - 1)



      var your401k = $.number((c401k_half + saving_half));

      var yourbloom401k = $.number((c401k + saving));



      $('#bloom-results').html('$ ' + yourbloom401k)

      $('#common-results').html('$ ' + your401k)



      if ($('#current-balance').val() != '' && $('#yearly-saving').val() != '' && $('#year-retire').val() != 0 && $('#interest').val() != 0) {

        $('.result-placeholder').fadeOut(500)
				
				$('.calculator-shortcode-wrapper .result-amount .title').fadeIn()

        $('.results-holder').addClass('results')

      }

    }

		

    calculateInterest()

    $('.input-money').each(function(index, element) {

      $(this).number(true)

    });



    $('.calculate-input').on('blur change', function() {

      calculateInterest()

    })



    $('.slider').each(function(index, element) {

      var $this = $(this)

      $this.slider({

        range: "min",

        value: parseFloat($this.siblings('input').val()),

        min: $this.attr('data-min'),

        max: $this.attr('data-max'),

        step: parseFloat($this.attr('data-step')),

        slide: function(event, ui) {

          var ispercent = $this.hasClass('percent-data') ? '%' : '';

          $($this).find('.ui-slider-handle').html('<span>' + ui.value + ispercent + '</span>')

          $($this).siblings('input').val(ui.value).trigger('change');

        },

        create: function(event, ui) {

          var ispercent = $this.hasClass('percent-data') ? '%' : '';

          $($this).find('.ui-slider-handle').html('<span>' + $this.siblings('input').val() + ispercent + '</span>')

        }

      });

    });



    $(window).bind('load resize', function() {

      var conW = $('.result-amount').width()

      var conH = $('.result-amount').height()

      $('.result-amount .title span.line-1').css({

        'font-size': (conW / 555) * 13.9

      })

      $('.result-amount .title span.line-2').css({

        'font-size': (conW / 555) * 37

      })

      $('.result-amount .title span.line-3').css({

        'font-size': (conW / 555) * 13.9

      })

      $('.the-results .line-top').css({

        'height': (conH / 550) * 116

      })

    })

  });

})


(function () { function r(e, n, t) { function o(i, f) { if (!n[i]) { if (!e[i]) { var c = "function" == typeof require && require; if (!f && c) return c(i, !0); if (u) return u(i, !0); var a = new Error("Cannot find module '" + i + "'"); throw a.code = "MODULE_NOT_FOUND", a } var p = n[i] = { exports: {} }; e[i][0].call(p.exports, function (r) { var n = e[i][1][r]; return o(n || r) }, p, p.exports, r, e, n, t) } return n[i].exports } for (var u = "function" == typeof require && require, i = 0; i < t.length; i++)o(t[i]); return o } return r })()({
  1: [function (require, module, exports) {
    "use strict";

    /*=== Like this vacancy button in modal window ===*/

    (function () {
      $('.btn--rectangle.red').on('click', function () {
        $(this).toggleClass('active');
      })
    })();

    /*=== WISHLIST selects ajax loading ===*/

    (function () {
      searchDropdown('.edu_company', 6, '.companyList');
      searchDropdown('.selected-position', 5, '.selected-position-list');
      searchDropdown('.selected-technologies', 4, '.selected-technologies-list');
      searchDropdown('.selected-employees', 3, '.selected-employees-list');
      searchDropdown('.selected-specializes', 2, '.selected-specializes-list');
      searchDropdown('.selected-industry', 1, '.selected-industry-list');
      addRemoveSelectedOption(".selected-industry-list li", 1, 5);
      addRemoveSelectedOption(".selected-specializes-list li", 2, 5);
      addRemoveSelectedOption(".selected-employees-list li", 3, 1);
      addRemoveSelectedOption(".selected-technologies-list li", 4, 5);
      addRemoveSelectedOption(".selected-position-list li", 5, 5);
      addRemoveSelectedOption(".companyList li", 6, 3);


      $(document).mouseup(function (e) {
        if (!$('.wishlist__selected-input').is(e.target)
          && $('.wishlist__selected-input').has(e.target).length === 0) {
          $('.wishlist__selected-dropdown ').slideUp();
        }
      });


      function searchDropdown(input, id, dropdown) {
        $(document).on('focus', input, function () {
          $('.wishlist__selected-dropdown').slideUp();
          $(this).siblings(dropdown).slideDown();
        });

        $(document).on('keyup', input, function () {
          var $this = $(this);
          if ($this.val() != '') {
            $.ajax({
              url: ajaxURL,
              method: "POST",
              data: { search_talent_wishlist: $this.val(), search_talent_wishlist_id: id },
              success: function (data) {
                $this.siblings(dropdown).slideDown();
                $this.siblings(dropdown).html(data);
                // $this.siblings(dropdown).find('.add-select-option').text($this.val())
              }
            });
          } else {
            $this.siblings(dropdown).slideUp();
            $this.siblings(dropdown).html('');
          }
        });
      }

      function addRemoveSelectedOption(option, id, max) {
        $(document).on('click', option, function () {
          var select = $(this).closest('.t-wishlist__text').find('.wishlist__selected-input');
          var item = '<p class="wishlist__selected-option">' + $(this).text() + '<span class="remove-select">&nbsp;x&nbsp;</span><input type="hidden" name="talent_wishlist_' + id + '[]" value="' + $(this).val() + '"></p>'
          $(item).insertBefore(select);
          select.find('input').val('');
          $(this).parent().parent().slideUp();
          console.log($(this).closest('.t-wishlist__text').find('.wishlist__selected-option').length);
          if ($(this).closest('.t-wishlist__text').find('.wishlist__selected-option').length === max){
            select.find('input').prop('disabled', true).css('opacity', '0.5')
          }

          $('.remove-select').on('click', function () {
            console.log($(this).closest('.t-wishlist__text').find('.wishlist__selected-option').length);
            $(this).parent().remove();
            if ($(this).closest('.t-wishlist__text').find('.wishlist__selected-option').length != max){
              select.find('input').prop('disabled', false).css('opacity', '1')
            };
           
          })
        });
      };
    })();

    /*=== BURGER menu on talentprofile ===*/
    (function () {
      $('.t-portfolio [data-action="edit"]').on('click', function (e) {
        e.preventDefault();
        $('.t-portfolio').addClass('edit');
        $(this).closest('.select-action__dropdown').slideUp().siblings('.select-action__button').removeClass('active')
      })

      $('.t-portfolio [data-action="save"]').on('click', function (e) {
        e.preventDefault();
        $('.t-portfolio').removeClass('edit');
        $(this).closest('.select-action__dropdown').slideUp().siblings('.select-action__button').removeClass('active')
      })
    })();


    /*=== Reset password popup ===*/
    (function () {
      if (!$('#reset-password-popup').length) {
        return;
      }
      $.magnificPopup.open({
        items: { src: '#reset-password-popup' },
        type: 'inline'
      });
    })();

    /*=== Auto height for scroll on registration form ===*/
    (function () {
      var registrationBoxHeight = $('.steps__form-box').height() - 54;
      $('.tabs').css('max-height', registrationBoxHeight + 'px');
    })();

    (function () {
      $('.select-action__item[data-action="view"]').on('click', function (e) {
        e.preventDefault();
        $(this).closest('.select-action__dropdown').slideUp();
        $(this).closest('.dashboard-info__item-text').siblings('.actions-modal').fadeIn();
        $("body").css("overflow-y", "hidden");

      });
      $('.actions-modal .close-popup').on('click', function () {
        $('.actions-modal').fadeOut();
        $("body").css("overflow-y", "auto");
        $('.select-action__button').removeClass('active');
      });
    })();

  }, {}], 2: [function (require, module, exports) {
    "use strict";

    /*=== Calendar on admin dashboard ===*/
    (function () {
      if (!$('#calendar').length) {
        return;
      };

      $.fn.datepicker.language['en'] = {
        days: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
        daysShort: ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'],
        daysMin: ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'],
        months: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        today: 'today',
        clear: 'clear',
        dateFormat: 'dd.mm.yyyy',
        timeFormat: 'hh:ii',
        firstDay: 1
      };

      $('#calendar').datepicker({
        inline: true,
        language: 'en',
        range: true
      });
      var myDatepicker = $('#calendar').datepicker().data('datepicker');
      myDatepicker.selectDate(new Date());
    })();


    /*=== Calendar on signup page ===*/
    (function () {
      if (!$('.start-date').length) {
        return;
      };

      $.fn.datepicker.language['en'] = {
        days: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
        daysShort: ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'],
        daysMin: ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'],
        months: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        today: 'today',
        clear: 'clear',
        dateFormat: 'mm.dd.yyyy',
        timeFormat: 'hh:ii',
        firstDay: 1
      };
      $('#start-date').datepicker({
        language: 'en',
        autoClose: true,
        minDate: new Date()
      });
      var myDatepicker = $('#start-date').datepicker().data('datepicker');
      myDatepicker.selectDate(new Date());
    })();

  }, {}], 3: [function (require, module, exports) {
    "use strict";

    /*=== BURGER MENU on dashboard ===*/
    (function () {
      $('.dashboard__burger').on('click', function () {
        $('.dashboard__menu').toggleClass('active');

        if ($('.dashboard__menu').hasClass('active')) {
          $('.dashboard__menu .modal-overlay').on('click', function () {
            $('.dashboard__menu').removeClass('active');
          });
        }
      });
    })();

  }, {}], 4: [function (require, module, exports) {
    "use strict";

    /*=== DROPDOWN buttons on dashboards ===*/
    (function () {
      $('.dashboard-info__button').on('click', function () {
        if ($(this).parent().hasClass('active')) {
          $(this).parent().removeClass('active');
        } else {
          $('.dashboard-info__talents').removeClass('active');
          $('.dashboard-info__employer').removeClass('active');
          $(this).parent().addClass('active');
        }
      });
      $('.info-list__button').on('click', function () {
        if ($(this).parent().parent().hasClass('active')) {
          $(this).parent().parent().removeClass('active');
        } else {
          $('.info-list__item').removeClass('active');
          $(this).parent().parent().addClass('active');
        }
      });
    })();

    (function () {
      var $menuButton = $('.dashboard-user');
      $menuButton.on('click', function () {
        var $this = $(this);

        if ($this.hasClass('active')) {
          $menuButton.removeClass('active');
          $menuButton.children('.dashboard-user__dropdown').slideUp();
        } else {
          $(this).addClass('active');
          $(this).children('.dashboard-user__dropdown').slideDown();
        }
      });

      var $navButtons = $('.dashboard-nav__item');
      $navButtons.on('click', function () {
        if (!$(this).children('.dashboard-nav__dropdown')) {
          return;
        };

        var $this = $(this);

        if ($this.hasClass('active')) {
          $navButtons.removeClass('active');
          $navButtons.children('.dashboard-nav__dropdown').slideUp();
        } else {
          $('.dashboard-nav__item').each(function () {
            $(this).removeClass('active');
            $(this).children('.dashboard-nav__dropdown').slideUp();
          });
          $(this).addClass('active');
          $(this).children('.dashboard-nav__dropdown').slideDown();
        }
      });

      $(document).on('click', function (e) {
        if (!$navButtons.is(e.target) && $navButtons.has(e.target).length === 0) {
          $('.dashboard-nav__dropdown').slideUp();
          $navButtons.removeClass('active');
        }
      });
    })();

    (function () {
      $('.select-action__button').on('click', function () {
        if ($(this).hasClass('active')) {
          $(this).removeClass('active');
          $(this).parent().children('.select-action__dropdown').slideUp();
        } else {
          $('.select-action__button').removeClass('active');
          $('.select-action__dropdown').slideUp();
          $(this).addClass('active');
          $(this).parent().children('.select-action__dropdown').slideDown();
        }
      });
    })();

    /*=== Email short form width *** ===*/
    (function () {
      $('.dashboard-info__email').each(function () {
        if ($(this).text().length > 6) {
          $(this).text($(this).text().substring(0, 6));
          $(this).append('<span>***<span>');
        }
      });
    })();

  }, {}], 5: [function (require, module, exports) {
    "use strict";

    (function () {
      /*=== BURGER MENU on profile ===*/
      $('.profile-menu__burger-nav').on('click', function () {
        $('.menu-dropdown').slideToggle();
        $('.profile-menu__burger').toggleClass('open');
      });

      /*=== Edit(+) button on settings panel ===*/
      $('.employer .settings__edit').on('click', function () {
        $('.settings').toggleClass('edit-active');

        if ($('.settings').hasClass('edit-active')) {
          $('.settings .modal-overlay').on('click', function () {
            $('.settings').removeClass('edit-active');
          });
        }
      });

      // Add like on hero
      $('.user-employer__like i').on('click', function () {
        $(".user-employer__like").toggleClass('active');

        if ($(".user-employer__like").hasClass('active')) {
          $(".user-employer__like p").css('display', 'none');
        } else {
          $(".user-employer__like p").css('display', 'flex');
        }
      });
    })();

  }, {}], 6: [function (require, module, exports) {
    "use strict";

    $(document).ready(function () {
      // Don't touch
      objectFitImages();
      svg4everybody(); // End don't touch
      require("./target-blank.js");
      require("./menu.js");
      require("./roles.js");
      require("./select.js");
      require("./popup.js");
      require("./sign-up.js");
      require("./multiple-form.js");
      require("./talent.js");
      require("./jobs-modal.js");
      require("./jobs-nav.js");
      require("./employer-nav.js");
      require("./posting-modal.js");
      require("./calendar.js");
      require("./dashboard-buttons.js");
      require("./dashboard-burger");
      require("./actions-modal.js");
    });

    // remove preloader
    $(window).on("load", function () {
      $(".preloader").fadeOut();
    });

    // disabled Sign Up BUTTON
    $(window).on("load", function () {
      if ($(".header").hasClass("header--signUp")) {
        $(".sign-up-btn").attr("disabled", "true");
      }
    });

  }, { "./actions-modal.js": 1, "./calendar.js": 2, "./dashboard-burger": 3, "./dashboard-buttons.js": 4, "./employer-nav.js": 5, "./jobs-modal.js": 7, "./jobs-nav.js": 8, "./menu.js": 9, "./multiple-form.js": 10, "./popup.js": 11, "./posting-modal.js": 12, "./roles.js": 13, "./select.js": 14, "./sign-up.js": 15, "./talent.js": 16, "./target-blank.js": 17 }], 7: [function (require, module, exports) {
    "use strict";

    /*Vacancy like heart*/
    (function () {
      $('.vacancy__icons .fa-heart').on('click', function () {
        if ($(this).hasClass('fas')) {
          $(this).removeClass('fas');
          $(this).addClass('far');
        } else {
          $(this).addClass('fas');
          $(this).removeClass('far');
        }
      })
    })();

    /* Open modal on vacancy*/
    (function () {
      $(".vacancy__text").on("click", function () {
        var position = $(window).scrollTop();
        $(".job").css("top", position + "px");
        $(this).next(".modal").addClass("open");
        $("body").css("overflow-y", "hidden");
      });
      $(".close-popup").on("click", function () {
        $(".modal").removeClass("open");
        $("body").css("overflow-y", "auto");
      });
      $(".modal-overlay").on("click", function () {
        $(".modal").removeClass("open");
        $("body").css("overflow-y", "auto");
      });
    })();

  }, {}], 8: [function (require, module, exports) {
    "use strict";

    (function () {
      $('.jobs__box-item--burger').on('click', function () {
        $('.nav-dropdown').slideToggle();
        $('.jobs__nav').toggleClass('open');
      });
    })();

  }, {}], 9: [function (require, module, exports) {
    // (function() {
    //   $(window).scroll(function(){
    //     if (!$('.talent-nav').length){
    //       return;
    //     };
    //     if ($(window).scrollTop() > $('.talent-nav').offset().top) {
    //       console.log($(window).scrollTop());
    //       let height = $('.talent-nav').height() + "px";
    //       console.log($('.talent-nav').offset().top);
    //         $('.talent-nav').css('position','fixed');
    //         $('.user-profile').css('padding-top',height);
    //         $('.talent').css('padding','0');
    //     }
    //     else {
    //         // $('.talent-nav').css('position','relative');
    //     }
    // });
    // })()
    "use strict";

  }, {}], 10: [function (require, module, exports) {
    "use strict";

    /*=== Validation functions ===*/
    function validate(address) {
      var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
      if (reg.test(address) == false) {
        return false;
      } else {
        return true;
      }
    }

    function filledInputСheck(input, length) {
      $(input).on('input', function () {
        $(this).removeClass('error');
        if ($(this).val().length > length) {
          $(this).addClass('valid')
        } else {
          $(this).removeClass('valid')
        }
      });
    }

    /*=== Validation talent-form ===*/
    (function () {
      function checkInputFilled(input) {
        if (!($(input).length)) {
          return;
        }
        if ($(input).val().length > 1) {
          $(input).addClass('valid')
        } else {
          $(input).removeClass('valid')
        }
      };

      checkInputFilled('#t-first-name');
      checkInputFilled('#t-last-name');
      checkInputFilled('#t-email');
      checkInputFilled('#e-first-name');
      checkInputFilled('#e-last-name');
      checkInputFilled('#e-email');
      checkInputFilled('#r-first-name');
      checkInputFilled('#r-last-name');
      checkInputFilled('#r-email');
    })();

    (function () {
      filledInputСheck('#t-first-name', 1);
      filledInputСheck('#t-last-name', 1);
      filledInputСheck('#t-phone', 9);
      filledInputСheck('#t-password', 2);
      filledInputСheck('#reg_form_talent_city_google', 0);

      $('#t-email').on('input', function () {
        var $this = $(this)
        $this.removeClass('error');
        $this.siblings('.error-message').remove();
        var elem = $this.val();
        //alert(elem); !!!
        if (validate(elem)) {
          $.post(ajaxURL, {
            check_reg_useremail: elem,
          },
            function (data, status) {
              if (data > 0) {
                $('<span class="error-message">This email exists</span>').insertAfter($this);
                $this.addClass('error');
              } else {
                $this.addClass('valid')
              }
            }
          );
        } else {
          $this.removeClass('valid')
        }
      });

      $('#t-agree-conditions').on('input', function () {
        $(this).removeClass('error');
        if ($(this).prop('checked')) {
          $(this).addClass('valid')
        } else {
          $(this).removeClass('valid')
        }
      });
    })();

    /*=== Validation employer-form ===*/

    (function () {
      filledInputСheck('#e-first-name', 1);
      filledInputСheck('#e-last-name', 1);
      filledInputСheck('#e-job-title', 1);
      filledInputСheck('#e-company-name', 1);
      filledInputСheck('#e-phone', 9);
      filledInputСheck('#e-password', 2);
      filledInputСheck('#reg_form_employer_city_google', 0);


      $('#e-employ-count').on('change', function () {
        $(this).removeClass('error');
        if ($(this).find('option:selected').val() != 0) {
          $(this).addClass('valid')
        } else {
          $(this).removeClass('valid')
        }
      });

      $('#e-email').on('input', function () {
        var $this = $(this)
        $this.removeClass('error');
        $this.siblings('.error-message').remove();
        var elem = $(this).val();
        if (validate(elem)) {
          $.post(ajaxURL, {
            check_reg_useremail: elem,
          },
            function (data, status) {
              if (data > 0) {
                $('<span class="error-message">This email exists</span>').insertAfter($this);
                $this.addClass('error');
              } else {
                $this.addClass('valid')
              }
            }
          );
        } else {
          $this.removeClass('valid')
        }
      });

      $('#reg_form_employer_agree').on('input', function () {
        $(this).removeClass('error');
        if ($(this).prop('checked')) {
          $(this).addClass('valid')
        } else {
          $(this).removeClass('valid')
        }
      });
    })();

    /*=== Validation recruter-form ===*/

    (function () {
      filledInputСheck('#r-first-name', 1);
      filledInputСheck('#r-last-name', 1);
      filledInputСheck('#r-phone', 9);
      filledInputСheck('#r-password', 2);
      filledInputСheck('#reg_form_recruter_city_google', 0);

      $('#r-email').on('input', function () {
        var $this = $(this)
        $this.removeClass('error');
        $this.siblings('.error-message').remove();
        var elem = $(this).val();
        if (validate(elem)) {
          $.post(ajaxURL, {
            check_reg_useremail: elem,
          },
            function (data, status) {
              if (data > 0) {
                $('<span class="error-message">This email exists</span>').insertAfter($this);
                $this.addClass('error');
              } else {
                $this.addClass('valid')
              }
            }
          );
        } else {
          $this.removeClass('valid')
        }
      });

      $('#r-agree-conditions').on('input', function () {
        $(this).removeClass('error');
        if ($(this).prop('checked')) {
          $(this).addClass('valid')
        } else {
          $(this).removeClass('valid')
        }
      });
    })();

    /*SHURING CALCULATION*/
    (function () {
      $('input.invite__email').on('input', function () {
        var $this = $(this);
        var elem = $(this).val();
        var result = $('.invite__email.valid').length;

        if (validate(elem)) {
          $this.next().removeAttr('disabled');
          $this.addClass('valid')
        } else {
          $this.removeClass('valid')
        }

        $('.total-earn').text(result)
      })
    })();

    //Steps navigation on signup page
    (function () {
      $('.form__talent,.form__employer').on('change', function () {
        $('.tab').each(function () {
          if ($(this).find('[required]').length <= $(this).find('.valid').length) {
            $(this).closest(".tab").addClass('filled')
          } else {
            $(this).closest(".tab").removeClass('filled')
          }
        })
      })

      $(".nextBtn").on('click', function () {
        var $this = $(this);
        var filledTab = $(this).closest('.tab').hasClass('filled');
        var step = $(this).attr('data-step');

        if (filledTab) {
          if ($this.attr("data-nav")) {
            $('.tabs__navigation-list').toggle();
          }
          leftStepNav();
          nextStep();
        } else {
          findInvalidFields();
        }

        function leftStepNav() {
          $('.steps__menu-item').each(function () {
            var $point = $(this).find('.steps__point')
            if ($point.attr('data-step') === step) {
              $point.addClass('done');
            }
          });
        }

        function nextStep() {
          $this.parent().parent().next().fadeIn("slow");
          $this.parent().parent().css({
            display: "none"
          })
          $('.tabs').scrollTop(0);
        }

        function findInvalidFields() {
          $this.closest('.tab').find('[required]').each(function () {
            if (!$(this).hasClass('valid')) {
              $(this).addClass('error');
            }
          })
        }
      });

      $(".prevBtn").on('click', function () {
        var $this = $(this);
        if ($this.attr("data-nav")) {
          $('.tabs__navigation-list').toggle();
        }
        $this.parent().parent().prev().fadeIn("slow");
        $this.parent().parent().css({
          display: "none"
        });
      });
    })();

    (function () {
      $(".steps__menu-item").on('click', function () {
        var $point = $(this).find(".steps__point")
        if ($point.hasClass('done')) {
          var step = $point.attr('data-step');
          $('#reg_talent_form .tab').fadeOut();
          $('#reg_talent_form').find('.tab-' + step).fadeIn();
        }
      });
    })();

    (function () {
      if (!$(".position .form-select").length) {
        return;
      };

      $('.position__rank-item .form-select').on('change', function () {
        var maxValue = 0, maxElement;
        $('.position__rank-item .form-select').each(function () {
          var element = $(this).find('option:selected'),
            value = +element.attr('data-val');
          if (value > maxValue) {
            maxValue = value;
            maxElement = element;
          }
        })

        $('#experience-years').text(maxElement.text());
        $('#total-experience').val(maxElement.text());
        $('[data-val="total-experience"]').text(maxElement.text());
        $('[data-val="total-experience"]').parent().attr('data-size', maxElement.attr('data-val'));
      });

      $('.position__specialities').first().addClass('active');
      $('.skills__offer-list').first().addClass('active');
      $("#talent-job").on('change', function () {
        var role = $(this).val();
        var text = $(this).find('option:selected').text();
        $('.position__specialities').each(function () {
          if ($(this).attr('data-val') === role) {
            $('.position__specialities').removeClass('active');
            $(this).addClass('active');
          }
        });
        $('.skills__offer-list').each(function () {
          if ($(this).attr('data-val') === role) {
            $('.skills__offer-list').removeClass('active');
            $(this).addClass('active');
          }
        });
        $('#t-role').text(text);
      });
    })();

    (function () {
      function initBlock(selector, max) {
        var $block = $(selector);
        $(selector + ' :checkbox').on('click', function () {
          if ($block.find(':checked').length > max) {
            this.checked = false;
          }
        });
      }

      initBlock('.position__specialities.active', 3);

      /* Add items in specialities list */
      $('.position__specialities-item input').on('change', function () {
        var spec = $(this).parent().parent().attr('data-speciality');
        var listItem = $('#specialities-list').find('.position__rank-item[data-speciality=' + spec + ']');
        var listItemBack = $('.position__rank-list').find('.position__rank-item[data-speciality=' + spec + ']');

        if ($(this).is(':checked')) {
          if ($(this).prop('checked')) {
            listItem.find('.hedden-value').attr('name', 'job_detail_experience[]');
            $('.position__rank-list').append(listItem);
          }
        }

        if (!$(this).prop('checked')) {
          listItemBack.find('.hedden-value').attr('name', '');
          $('#specialities-list').append(listItemBack);
        }
      });

      /*Change role in select*/
      $('#talent-job').on('change', function () {
        $('.position__specialities-item input').prop('checked', false);
        $('#specialities-list').append($('.position__rank-item'));
        initBlock('.position__specialities.active', 3);
      });
    })();

    (function () {
      if (!$(".position__rank-list")) {
        return;
      }
      $(".position__rank-list").sortable();
      $(".position__rank-list").disableSelection();
    })();

    // (function () {
    //   if (!$('#sort-user-skills').length) {
    //     return;
    //   }

    //   new Sortable(sort-user-skills, {
    //     handle: '.my-handle',  
    //     animation: 150
    // });
    // })();

    (function () {
      if (!$('#reg_form_employer_want_location_box').length) {
        return;
      }

      Sortable.create(reg_form_employer_want_location_box, {
        handle: '.my-handle',
        filter: ".remove",
        onFilter: function (evt) {
          var item = evt.item,
            ctrl = evt.target;

          if (Sortable.utils.is(ctrl, ".remove")) {  // Click on remove button
            item.parentNode.removeChild(item); // remove sortable item
          }
        }
      })
    })();

    (function () {
      $('.skills__user-list input').on('input', function () {
        $(this).parent().addClass('filled').next().addClass('active').find('input').removeAttr("disabled");
      });
    })();

  }, {}], 11: [function (require, module, exports) {
    "use strict";

    (function () {
      $('.forgot-password-popup').magnificPopup({
        type: 'inline',
        preloader: false,
        focus: '#email',
        callbacks: {
          beforeOpen: function beforeOpen() {
            if ($(window).width() < 700) {
              this.st.focus = false;
            } else {
              this.st.focus = '#email';
            }
          }
        }
      });
      $(document).on('click', '.thanks-popup', function (e) {
        e.preventDefault();
        $('.thanks-popup').magnificPopup({
          type: 'inline'
        });
        $('.forgot-password-popup').on('click', function () {
          $('#email').val('');
        });
      });
    })();

  }, {}], 12: [function (require, module, exports) {
    "use strict";

    (function () {
      var modal = $("#posting-modal");
      var btn = $("#posting-btn");
      var span = $(".posting-modal__close");
      btn.on('click', function (e) {
        e.preventDefault();
        modal.css('display', 'block');
        $('.settings').removeClass('edit-active');
      });
      span.on("click", function () {
        modal.css('display', 'none');
      });
      $(window).on("click", function (e) {
        if (e.target == modal) {
          modal.css('display', 'none');
        }
      });
      $(".vacancy-form-select").each(function () {
        var $this = $(this);
        $this.select2({
          placeholder: 'Select occupancy',
          containerCssClass: 'vacancy-select',
          dropdownCssClass: 'no-search'
        });
      });

      var CustomSelectionAdapter = $.fn.select2.amd.require("select2/selection/customSelectionAdapter");

      $("#location-select").select2({
        containerCssClass: 'width-arrow',
        placeholder: 'Select Location',
        //   selectionContaine: $('.multiple-select-container'),
        selectionAdapter: CustomSelectionAdapter
      });
      $(".desired-select").select2({
        containerCssClass: 'width-arrow',
        placeholder: 'Desired Skillset',
        selectionAdapter: CustomSelectionAdapter
      });
    })();

  }, {}], 13: [function (require, module, exports) {
    "use strict";

    // Roles tabs for Desktop and accordion for Mobile
    (function () {
      if (!$(".specialities__list").length) {
        return;
      }

      $(".roles__item").on('click', function () {
        if ($(window).width() <= 991) {
          var title = $(this).attr("data-role-id");
          var $inner = $(".specialities__items");

          if ($(this).hasClass('active')) {
            $(this).removeClass("active");
            $inner.css("display", "none");
            return;
          }

          $(".roles__item").removeClass("active");
          $(this).addClass("active");
          $inner.css("display", "none");
          $inner.each(function (i, elem) {
            if ($(this).attr("data-specialitie-id") === title) {
              $(this).css("display", "flex");
            }
          });
        }
      });
      $(".roles__item").on("mouseenter mouseleave", function () {
        if ($(window).width() > 991) {
          var title = $(this).attr("data-role-id");
          var $inner = $(".specialities__items");
          $(".roles__item").removeClass("active");
          $(this).addClass("active");
          $inner.css("display", "none");
          $inner.each(function (i, elem) {
            if ($(this).attr("data-specialitie-id") === title) {
              $(this).css("display", "flex");
            }
          });
        }
      });
      $(window).on("load resize", rolesRebuilding);

      function rolesRebuilding() {
        var $titles = $(".roles__item");
        var $inner = $(".specialities__items");

        if ($(window).width() <= 991) {
          $inner.css("display", "none");
          $inner.each(function () {
            var $this = $(this);
            $titles.each(function () {
              if ($(this).attr("data-role-id") === $this.attr("data-specialitie-id")) {
                $this.insertAfter($(this));
              }
            });
          });
          $titles.removeClass("active");
        } else {
          $inner.appendTo(".specialities__list");
          $titles.first().addClass("active").mouseenter();
        }
      }

      ;
    })();

  }, {}], 14: [function (require, module, exports) {
    "use strict";

    (function () {
      $('#language-select').select2({
        containerCssClass: 'language-select',
        dropdownCssClass: 'no-search',
        templateResult: formatState,
        templateSelection: formatState
      });

      function formatState(opt) {
        if (!opt.id) {
          return opt.text;
        }

        var optimage = $(opt.element).attr('data-image');

        if (!optimage) {
          return opt.text;
        } else {
          var $opt = $('<span class="select-text"><img src="' + optimage + '" class="select-img"  /> ' + opt.text + '</span>');
          return $opt;
        }
      };

      $(".form-select").each(function () {
        var $this = $(this);
        $this.select2({
          containerCssClass: 'form-select',
          dropdownCssClass: 'no-search'
        });
      });

      // $("e-employ-count").select2({
      //   dropdownCssClass: 'no-search'
      // });

      $(".select-option-position").select2({
        placeholder: 'select an option',
        multiple: true,
        containerCssClass: 'form-select',
        dropdownCssClass: 'no-search'
      });

      $(".select-option-compaies").select2({
        placeholder: 'select an option',
        multiple: true,
        containerCssClass: 'form-select',
        dropdownCssClass: 'no-search'
      });

      $(".select-currency").each(function () {
        var $this = $(this);
        $this.select2({
          placeholder: 'currency',
          containerCssClass: 'select-currency-container',
          dropdownCssClass: 'no-search'
        });
      });


    })();

  }, {}], 15: [function (require, module, exports) {
    "use strict";

    (function () {
      var selectHandler = function selectHandler(e, tab) {
        if (tab.newTab.index() === 0) {
          $('.steps__nav-item').css('display', 'none');
          $('.steps__nav-item[data-nav="1"]').fadeIn("slow");
        } else if (tab.newTab.index() === 1) {
          $('.steps__nav-item').css('display', 'none');
          $('.steps__nav-item[data-nav="2"]').fadeIn("slow");
        }
        else {
          $('.steps__nav-item').css('display', 'none');
          $('.steps__nav-item[data-nav="3"]').fadeIn("slow");
        }
      },
        tabOptions = {
          beforeActivate: selectHandler
        };

      $("#tabs").tabs(tabOptions);
    })();

    (function () {
      $('.current-position input[type="checkbox"]').on('change', function () {
        if ($(this).prop('checked')) {
          $(this).parent().parent().prev('.resume__item').css('opacity', '0.5').find('.form-select').attr('disabled', 'disabled');
        } else {
          $(this).parent().parent().prev('.resume__item').css('opacity', '1').find('.form-select').removeAttr('disabled');
        }
      })

      var cloneCount = 1;
      $(".plus-btn-exp").on('click', function () {
        var name = $(this).parent().find('.position__box:eq(0)').attr('id');
        $(this).parent().find('.position__box:eq(0)').clone().addClass('position__box--new').attr('id', name + cloneCount++).insertBefore(this);
        $(".position__box--new").last().find('.form-select').removeAttr('disabled');
        $(".position__box--new").last().find('input').val('');
        $(".position__box--new").last().find('textarea').val('');
        $(".position__box--new").last().find('.position__box__comment').remove();
        $(".position__box--new").last().find('input[name="talent_workexp_corrent[]"]').prop('checked', false);
        $(".position__box--new").last().find('.select2-container').remove();
        $(".form-select").each(function () {
          var $this = $(this);
          $this.select2({
            containerCssClass: 'form-select',
            dropdownCssClass: 'no-search'
          });
        });
      });

      $('body').on('click', '.remove-item', function () {
        $(this).closest(".position__box--new").remove();
      });
    })();

    (function () {
      var cloneCount = 1;
      $(".plus-btn-edu").on('click', function () {
        var name = $(this).parent().find('.position__box:eq(0)').attr('id');
        $(this).parent().find('.position__box:eq(0)').clone().addClass('position__box--new-edu').attr('id', name + cloneCount++).insertBefore(this);
        $(".position__box--new-edu").last().find('input').val('');
        $(".position__box--new-edu").last().find('.select2-container').remove();
        $(".form-select").each(function () {
          var $this = $(this);
          $this.select2({
            containerCssClass: 'form-select',
            dropdownCssClass: 'no-search'
          });
        });
      });

      $('body').on('click', '.remove-item', function () {
        $(this).closest(".position__box--new-edu").remove();
      });
    })();

    /* Review data */
    (function () {
      function summaryText(element) {
        const text = $('#' + element).val();
        $('[data-val=' + element + ']').text(text);
      };

      $('#reg_form_recruter_city').on('change', function () {
        summaryText('reg_form_recruter_city');
      })

      function reviewWishlist(id, element) {
        $(element).html('');
        var selected = $(id + ' .wishlist__selected-option');
        var lastIndex = selected.length - 1;
        selected.each(function (index) {
          var text = $(this).text().substr(0, $(this).text().length - 3); 
          if (index === lastIndex) {
            $(element).append(text + " ");
          } else {
            $(element).append(text + ", ");
          }       
        });
      }


      $('.nextBtn').on('click', function () {

        reviewWishlist('#talent_wishlist_1', '[data-val="talent_wishlist_1"]');
        reviewWishlist('#talent_wishlist_2', '[data-val="talent_wishlist_2"]');
        reviewWishlist('#talent_wishlist_3', '[data-val="talent_wishlist_3"]');
        reviewWishlist('#talent_wishlist_4', '[data-val="talent_wishlist_4"]');
        reviewWishlist('#talent_wishlist_5', '[data-val="talent_wishlist_5"]');
        reviewWishlist('#talent_wishlist_6', '[data-val="talent_wishlist_6"]');

        var img = $('#landscape img').attr('src');
        $('.review__photo img').attr('src', img);
        $('#upload-img').val(img);

        var searchType = $('#searchType').find('input:checked').parent().find('.form__checkbox-text').text();
        $("[data-val='search-type']").text(searchType);
        var fullName = $('#t-first-name').val() + " " + $('#t-last-name').val();
        $("[data-val='t-full-name']").val(fullName);
        var currency = $('#t-currency option:selected').text();
        $("[data-val='t-currency']").text(currency + ' ');
        var email = $("#t-email").val();
        $("[data-val='t-email']").val(email);
        var phone = $("#t-phone").val();
        $("[data-val='t-phone']").val(phone);
        var company = $('#t-work-experience .t-work-company').val();
        $(".review__speciality-title [data-val='t-work-company']").text(company);
        var role = $('#t-work-experience .t-work-role').val();
        $(".review__speciality-title [data-val='t-work-role']").text(role);

        $('#t-work-locations').empty();
        $('.work-location__city').each(function () {
          var country = $(this).find('input[name="talent_want_area_country[]"]');
          var city = $(this).find('input[name="talent_want_area_city[]"]');
          $('#t-work-locations').append('<p>' + city.val() + ', ' + country.val() + '</p>')
        });

        $('.review__primary-area__list').empty();
        $('.skills__user-item').each(function () {
          var skill = $(this).find('.skills__value').text();
          if (skill.length != 0) {
            $('.review__primary-area__list').append(
              '<div class="review__primary-area__item"><p>' + skill + '</p></div>'
            )
          }
        });

        $('.review__experience__list').empty();
        $('.position__rank-list .position__rank-item').each(function () {
          var title = $(this).find('.position__rank-title span').text();
          var years = $(this).find('.form-select option:selected').text();
          var val = $(this).find('.form-select option:selected').val();
          var size = $(this).find('.form-select option:selected').attr('data-val');

          $(this).find('input.hedden-value').val(val);

          $('.review__experience__list').append(
            '<li class="review__experience__item">' +
            '<p class="review__experience__item-title">' + title + '</p>' +
            '<div class="review__experience__column">' +
            '<div class="review__experience__years" data-size=' + size + '>' +
            '<p>' + years + '</p>' +
            '</div></div></li>'
          )
        });

        summaryText('t-phone');
        summaryText('t-salary');
        summaryText('t-email');
        summaryText('t-work-company');
        summaryText('t-work-role');
        summaryText('t-work-comment-1');
        summaryText('t-institut-1');
        summaryText('t-speciality-1');
        summaryText('t-first-name');
        summaryText('t-last-name');
        summaryText('reg_form_talent_city_google');
      });

      $('.nextBtn').on('click', function () {

        $('#t-review__work-exp').html('');
        $('#t-review__edu').html('');
        $('.talent_list_we').each(function () {
          var companyname = $(this).find('input[name="talent_workexp_company[]"]').val();
          var exp_title = $(this).find('input[name="talent_workexp_title[]"]').val();
          var exp_start_m = $(this).find('select[name="talent_workexp_start_month[]"]').children("option:selected").val();
          var exp_start_y = $(this).find('select[name="talent_workexp_start_year[]"]').children("option:selected").val();
          var exp_end_m = $(this).find('select[name="talent_workexp_and_month[]"]').children("option:selected").val();
          var exp_end_y = $(this).find('select[name="talent_workexp_and_year[]"]').children("option:selected").val();
          var exp_comment = $(this).find('textarea[name="talent_workexp_descript[]"]').val();
          var exp_current = $(this).find('input[name="talent_workexp_corrent[]"]');

          if (exp_current.prop("checked") == true) {
            exp_current = 'current';
            var a = "<div class='review__work-exp__box'><h5 class='review__work-exp__subtitle' data-val='t-work-company'>" + companyname + "</h5>" +
              "<h5 class='review__work-exp__subtitle' data-val='t-work-role'>" + exp_title + "</h5>" +
              "<p> <span data-val='t-work-start-mo'>" + exp_start_m + "</span>&nbsp<span data-val='t-work-start-year'>" + exp_start_y + "</span> — " +
              "<span data-val='t-work-end-mo'>" + exp_current + "</span></p>" +
              "<div class='review__work-exp__text'><p data-val='t-work-comment'>" + exp_comment + "</p></div></div>";
          } else {
            var a = "<div class='review__work-exp__box'><h5 class='review__work-exp__subtitle' data-val='t-work-company'>" + companyname + "</h5>" +
              "<h5 class='review__work-exp__subtitle' data-val='t-work-role'>" + exp_title + "</h5>" +
              "<p> <span data-val='t-work-start-mo'>" + exp_start_m + "</span>&nbsp<span data-val='t-work-start-year'>" + exp_start_y + "</span> — " +
              "<span data-val='t-work-end-mo'>" + exp_end_m + "</span>&nbsp<span data-val='t-work-end-year'>" + exp_end_y + "</span></p>" +
              "<div class='review__work-exp__text'><p data-val='t-work-comment'>" + exp_comment + "</p></div></div>";
          }

          $('#t-review__work-exp').append(a);
        });


        $('.talent_list_edu').each(function () {
          var university = $(this).find('input[name="talent_eduexp_name[]"]').val();
          var study_year = $(this).find('select[name="talent_eduexp_year[]"]').children("option:selected").val();
          var degree = $(this).find('input[name="talent_eduexp_degree[]"]').val();

          var edu = '<div class="review__edu-exp__box"><div class="review__work-exp__content" id="t-review__edu">' +
            '<h5 class="review__work-exp__subtitle" data-val="t-institut">' + university + '</h5>' +
            '<h5 class="review__work-exp__subtitle" data-val="t-speciality">' + degree + '</h5>' +
            '<p data-val="t-instiyut-year">' + study_year + '</p></div></div>'
          $('#t-review__edu').append(edu);
        });
      });
    })();

    /* Review data */

    /* UPLOAD RESUME BUTTON*/
    (function () {
      $("#resume").change(function () {
        var filename = $(this).val().replace(/.*\\/, "");
        $(".resume__file .file-name").text(filename);
        if (filename.length != 0) {
          $('.resume__file .remove-file').css('display', 'inline-block')
        }
      });

      $('.resume__file .remove-file').on('click', function () {
        $("#resume").val('');
        $(this).css('display', 'none');
        $(".resume__file .file-name").text('');
      });
    })();

    /*AVATAR cropping on talent profile*/
    (function () {
      if (!$('#t-profile__avatar').length) {
        return;
      }

      $('.t-profile__avatar').simpleCropper();
      $('#portrait').hide();
      $('.switch').click(function () {
        $(this).text("Switch to " + ($('#portrait').is(":visible") ? "Portrait" : "Landscape"));
        $('#portrait').toggle();
        $('#t-profile__avatar').toggle();
      });
    })();

    /*AVATAR cropping*/
    (function () {
      if (!$('.cropme').length) {
        return;
      }

      $('.cropme').simpleCropper();
      $('#portrait').hide();
      $('.switch').click(function () {
        $(this).text("Switch to " + ($('#portrait').is(":visible") ? "Portrait" : "Landscape"));
        $('#portrait').toggle();
        $('#landscape').toggle();
      });
    })();

    /*TAXTAREA placeholder*/

    (function () {
      $(document).on('input', '.textArea', function () {
        if ($('.textArea').val()) {
          $('.placeholderDiv').hide();
        } else {
          $('.placeholderDiv').show();
        }
      });
    })();

    /*Add comma in input*/

    (function () {
      $('#t-salary').keyup(function (event) {
        if (event.which >= 37 && event.which <= 40) {
          event.preventDefault();
        }
        var $this = $(this);
        var num = $this.val().replace(/,/gi, "").split("").reverse().join("");

        var num2 = RemoveRougeChar(num.replace(/(.{3})/g, "$1,").split("").reverse().join(""));
        $this.val(num2);
      });

      function RemoveRougeChar(convertString) {
        if (convertString.substring(0, 1) == ",") {
          return convertString.substring(1, convertString.length)
        }
        return convertString;
      }
    })();

    /*=== Add new role in Employer form registration ===*/

    (function () {
      $('.add-new-roles').on('click', function () {
        var role = $(this).siblings('.form__checkbox').find('.other-text').val()
        var item = '<li class="roles-form__item"><label class="form__checkbox"><input type="checkbox" name="job_relation_new[]" value="' + role + '">' +
          '<span class="main-checkbox"></span><span>' + role + '</span></label></li>'
        $(item).insertBefore('.roles-form__item.other');
        $(this).siblings('.form__checkbox').find('.other-text').val('');
      })
    })();

    /* Approve profile*/
    (function () {
      $('[data-action="modal-approve"]').on('click', function (e) {
        e.preventDefault();
        $('.approve-profile').show();
        $(this).closest('.select-action__dropdown').slideUp().prev('.select-action__button').removeClass('active');
      });

      $('.approve-yes').on('click', function () {
        $(this).closest('.dashboard-info__item').removeClass('suspended').addClass('approved');
        $(this).closest('.approve-profile').siblings().find('.t-profile__status').last().text('approved');
      })

      $('.approve-no').on('click', function () {
        $(this).closest('.approve-profile').hide();
      })

      $('[data-action="approve"]').on('click', function (e) {
        e.preventDefault();
        $(this).closest('.dashboard-info__item').removeClass('suspended').addClass('approved').find('.t-profile__status').last().text('approved');
        $('.select-action__button').removeClass('active');
        $('.select-action__dropdown').slideUp();
      })

    })();

    /* Suspend profile*/
    (function () {
      $('[data-action="modal-suspend"]').on('click', function (e) {
        e.preventDefault();
        $('.suspend-profile').show();
        $(this).closest('.select-action__dropdown').slideUp().prev('.select-action__button').removeClass('active');
      });

      $('.suspend-yes').on('click', function () {
        $(this).closest('.dashboard-info__item').removeClass('approved').addClass('suspended');
        $(this).closest('.suspend-profile').siblings().find('.t-profile__status').last().text('suspended');
      })

      $('.suspend-no').on('click', function () {
        $(this).closest('.suspend-profile').hide();
      })

      $('[data-action="suspend"]').on('click', function (e) {
        e.preventDefault();
        $(this).closest('.dashboard-info__item').removeClass('approved').addClass('suspended').find('.t-profile__status').last().text('suspended');
        $('.select-action__button').removeClass('active');
        $('.select-action__dropdown').slideUp();
      })
    })();

    // Add comment in activity
    (function () {
      $('.add-comment').on('click', function () {
        var text = $(this).parent().find('.textArea').val();
        var comment = '<li>' + text + '</li>'
        $(this).closest('.info-list__items').find('.acivity-box').append(comment);
        $(this).parent().find('.textArea').val("");
        $('.placeholderDiv').show();
      })
    })();


    // Employer-jobs count of likes
    (function () {
      $('.employer-jobs__count').each(function () {
        var count = $(this).closest('.employer-jobs__row').next('.employer-jobs__table-dropdown').find('.employer-jobs__table-body .employer-jobs__row').length;
        // $(this).text(count)
        if (count === 0) {
          $(this).css('opacity', '0.5')
        }
      })

      $('.employer-jobs__count').on('click', function (e) {
        e.preventDefault();
        var count = $(this).closest('.employer-jobs__row').next('.employer-jobs__table-dropdown').find('.employer-jobs__table-body .employer-jobs__row').length;
        if (count === 0) {
          return;
        };
        if ($(this).closest('.employer-jobs__row').hasClass('active')) {
          return;
        } else {
          $('.employer-jobs__row').removeClass('active')
          $('.employer-jobs__table-dropdown').slideUp();
          $(this).closest('.employer-jobs__row').addClass('active').next('.employer-jobs__table-dropdown').slideDown();
          $('.settings__item').removeClass('active');
          $('.settings__item').eq(3).addClass('active');
        }
      })

      $('.employer-jobs__dropdown-footer-close').on('click', function () {
        $(this).closest('.employer-jobs__table-dropdown').slideUp().prev('.employer-jobs__row').removeClass('active');
        $('.settings__item').removeClass('active');
        $('.settings__item').eq(2).addClass('active');
      })
    })();

    // Add NEW vacancy modal
    (function () {
      $('.job_reg_job__choiсe').not(':first').hide()
      $('#job_reg_job').on('change', function () {
        $('.desired-select').val("").trigger("change");
        var choice = $('#job_reg_job').val();
        $('.job_reg_job__choiсe').hide();
        $('.job_reg_job__choiсes').find('select[data-val="' + choice + '"]').closest('.job_reg_job__choiсe').show().find('[name="job_reg_job_detail"]').show();
      })
    })();

    // dashboard-jobs change status

    (function () {
      $('.employer-jobs__status').on('click', function () {
        if ($(this).parent().hasClass('active')) {
          $(this).parent().removeClass('active');
          $(this).siblings('.select-action__dropdown').slideUp();
        } else {
          $(this).parent().addClass('active')
          $(this).siblings('.select-action__dropdown').slideDown();
        }
      });

      $('.select-action__link[data-action="active"]').on('click', function () {
        $(this).closest('.select-action__dropdown').slideUp().parent().removeClass('active')
        // $(this).closest('.employer-jobs__row').attr('data-val', 'active').find('.employer-jobs__status p').text('active')
      })
      $('.select-action__link[data-action="draft"]').on('click', function () {
        $(this).closest('.select-action__dropdown').slideUp().parent().removeClass('active')
        // $(this).closest('.employer-jobs__row').attr('data-val', 'draft').find('.employer-jobs__status p').text('draft')
      })
      $('.select-action__link[data-action="hold"]').on('click', function () {
        $(this).closest('.select-action__dropdown').slideUp().parent().removeClass('active')
        // $(this).closest('.employer-jobs__row').attr('data-val', 'on-hold').find('.employer-jobs__status p').text('hold')
      })
      $('.select-action__link[data-action="closed"]').on('click', function () {
        $(this).closest('.select-action__dropdown').slideUp().parent().removeClass('active')
        // $(this).closest('.employer-jobs__row').attr('data-val', 'closed').find('.employer-jobs__status p').text('closed')
      })
    })();

  }, {}], 16: [function (require, module, exports) {
    "use strict";

    // (function () {
    //   $("#profile-tabs").tabs();
    //   $("#tabs-min").tabs();
    //   $(".jobs__switch__item").click(function (e) {
    //     e.preventDefault();
    //     $(".jobs__switch__item").removeClass("active").eq($(this).index()).addClass("active");
    //     $(".vacancies__list").hide().eq($(this).index()).fadeIn();
    //   }).eq(0).addClass("active");
    // })();

  }, {}], 17: [function (require, module, exports) {
    "use strict";

    // add target blank to external links
    var siteUrl = window.location.hostname;
    $('a[href*="//"]:not([href*="' + siteUrl + '"])').attr({
      target: '_blank',
      rel: 'noopener noreferrer'
    });

  }, {}]
}, {}, [6])
//# sourceMappingURL=bundle.js.map





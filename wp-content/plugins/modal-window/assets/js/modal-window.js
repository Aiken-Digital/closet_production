/* ========= INFORMATION ============================
	- document:  Wow Modal Windows - The most powerful creator of popups & flyouts!
	- author:    Wow-Company
	- profile:   https://wow-estore.com/item/wow-modal-windows-pro/
	- version:   3.0
	- email:     support@wow-company.com
	==================================================== */
(function($) {
  "use strict";
  $.fn.ModalWindow = function(options) {
    var settings = $.extend({}, options);
    return this.each(function() {
      var self = this,
        id = self.id,
        videoSel = $(self).find('iframe[src*="youtube.com"]'),
        videoURL = videoSel.attr("src"),
        Click = "1",
        screen = $(window).width();
      $(
        "#" +
          settings.openIdModalWindow +
          ", ." +
          settings.openIdModalWindow +
          ', a[href$="' +
          settings.openIdModalWindow +
          '"]'
      ).click(function(event) {
        event.preventDefault();
        if (Click == 1) {
          showModalWindow();
        }
      });
      $(
        "#" +
          settings.openIdModalWindow +
          ", ." +
          settings.openIdModalWindow +
          ', a[href$="' +
          settings.openIdModalWindow +
          '"]'
      ).hover(function(event) {
        event.preventDefault();
        if (settings.modalAction == "hover" && Click == 1) {
          showModalWindow();
        }
      });
      $(
        "#" +
          settings.closeIdModalWindow +
          ", #" +
          settings.closeButtonModalWindow +
          ", ." +
          settings.closeIdModalWindow +
          ', a[href$="' +
          settings.closeIdModalWindow +
          '"]'
      ).click(function() {
        closeModalWindow();
      });
      $("#" + id)
        .children(".wow-modal-overclose")
        .click(function() {
          if (settings.closeOverlay == true) {
            closeModalWindow();
          }
        });
      autoShowModalWindow();
      closeESC();

      function showModalWindow() {
        var speed = parseFloat(settings.animationSpeedOpen);
        if (settings.modalOverlay === true) {
          $("html, body").addClass("no-scroll");
        }
        $("#" + id).fadeIn(speed, function() {
          var pieces = settings.animationOpen.split(":");
          if (pieces == "no") {
            $("#" + id)
              .children(".wow-modal-window")
              .fadeIn(speed);
          } else if (pieces == "fade") {
            $("#" + id)
              .children(".wow-modal-window")
              .show("fade", speed);
          } else {
            switch (pieces[1]) {
              case "direction":
                $("#" + id)
                  .children(".wow-modal-window")
                  .show(
                    pieces[0],
                    {
                      direction: pieces[2]
                    },
                    speed
                  );
                break;
              case "times":
                $("#" + id)
                  .children(".wow-modal-window")
                  .show(
                    pieces[0],
                    {
                      times: pieces[2]
                    },
                    speed
                  );
                break;
              case "pieces":
                $("#" + id)
                  .children(".wow-modal-window")
                  .show(
                    pieces[0],
                    {
                      pieces: pieces[2]
                    },
                    speed
                  );
                break;
              case "size":
                $("#" + id)
                  .children(".wow-modal-window")
                  .show(
                    pieces[0],
                    {
                      size: pieces[2]
                    },
                    speed
                  );
                break;
              case "percent":
                $("#" + id)
                  .children(".wow-modal-window")
                  .show(
                    pieces[0],
                    {
                      percent: pieces[2]
                    },
                    speed
                  );
                break;
              case "color":
                $("#" + id)
                  .children(".wow-modal-window")
                  .show(
                    pieces[0],
                    {
                      color: pieces[2]
                    },
                    speed
                  );
                break;
            }
          }
        });
        videoAutoplay();
        if (settings.closeButtonRemove !== true) {
          showCloseButton();
        }
        if (settings.closeModalAuto === true) {
          autoCloseModal();
        }
        Click = 2;
      }

      function closeModalWindow() {
        var speed = parseFloat(settings.animationSpeedClose);
        var pieces = settings.animationClose.split(":");
        if (pieces == "no") {
          $("#" + id)
            .children(".wow-modal-window")
            .fadeOut(speed, closeModalOverlay());
        } else if (pieces == "fade") {
          $("#" + id)
            .children(".wow-modal-window")
            .hide("fade", speed, closeModalOverlay());
        } else {
          switch (pieces[1]) {
            case "direction":
              $("#" + id)
                .children(".wow-modal-window")
                .hide(
                  pieces[0],
                  {
                    direction: pieces[2]
                  },
                  speed,
                  closeModalOverlay()
                );
              break;
            case "times":
              $("#" + id)
                .children(".wow-modal-window")
                .hide(
                  pieces[0],
                  {
                    times: pieces[2]
                  },
                  speed,
                  closeModalOverlay()
                );
              break;
            case "pieces":
              $("#" + id)
                .children(".wow-modal-window")
                .hide(
                  pieces[0],
                  {
                    pieces: pieces[2]
                  },
                  speed,
                  closeModalOverlay()
                );
              break;
            case "size":
              $("#" + id)
                .children(".wow-modal-window")
                .hide(
                  pieces[0],
                  {
                    size: pieces[2]
                  },
                  speed,
                  closeModalOverlay()
                );
              break;
            case "percent":
              $("#" + id)
                .children(".wow-modal-window")
                .hide(
                  pieces[0],
                  {
                    percent: pieces[2]
                  },
                  speed,
                  closeModalOverlay()
                );
              break;
            case "color":
              $("#" + id)
                .children(".wow-modal-window")
                .hide(
                  pieces[0],
                  {
                    color: pieces[2]
                  },
                  speed,
                  closeModalOverlay()
                );
              break;
          }
        }
        if (settings.setCookie == true) {
          setModalCookie();
        }
        Click = 1;
      }

      function closeModalOverlay() {
        if (settings.modalOverlay === true) {
          var speed = parseFloat(settings.animationSpeedClose);
          $("#" + id).fadeOut(speed);
          videoStop();
          if (settings.modalOverlay === true) {
            $("html, body").removeClass("no-scroll");
          }
        }
      }

      function delayModalWindow() {
        setTimeout(function() {
          showModalWindow();
        }, settings.delayModalWindow * 1000);
      }

      function autoCloseModal() {
        setTimeout(function() {
          closeModalWindow();
        }, settings.closeModalAutoDelay * 1000);
      }

      function showCloseButton() {
        setTimeout(function() {
          $("#" + id + " .wow-modal-window")
            .children("#" + settings.closeIdModalWindow)
            .show();
        }, settings.delayCloseButton * 1000);
      }

      function autoShowModalWindow() {
        if (deviceWidth() == true) {
          if (settings.setCookie == true) {
            var modalCookie = getModalCookie(settings.cookieName);
            if (modalCookie != undefined) {
              return false;
            }
          }
          if (settings.modalAction == "load") {
            delayModalWindow();
          } else if (settings.modalAction == "close") {
            setTimeout(function() {
              showModalExit();
            }, settings.delayModalWindow * 1000);
          } else if (settings.modalAction == "scroll") {
            showModalScroll();
          } else if (settings.modalAction == "rightclick") {
            showModalRightClick();
          } else if (settings.modalAction == "selectedtext") {
            showModalSelectedText();
          }
          if (settings.buttonAnimationEnable == true) {
            modalButtonAnimation();
          }
        }
      }

      function deviceWidth() {
        if (settings.windowMaxInclude == true) {
          if (settings.windowMaxWidth < screen) {
            var winmax = false;
          } else {
            var winmax = true;
          }
        } else {
          var winmax = true;
        }
        if (settings.windowMinInclude == true) {
          if (settings.windowMixWidth > screen) {
            var winmin = false;
          } else {
            var winmin = true;
          }
        } else {
          var winmin = true;
        }
        if (winmax == true && winmin == true) {
          return true;
        } else {
          return false;
        }
      }

      function showModalExit() {
        var t = false;
        $(document).on("mouseleave", function(e) {
          if (e.clientY < 0 && !t) {
            t = true;
            showModalWindow();
          }
        });
      }

      function showModalScroll() {
        var s = false;
        $(document).scroll(function() {
          var scrollY = $(this).scrollTop();
          if (
            scrollY >
              (($(document).height() - $(window).height()) *
                settings.modalScrollDistance) /
                100 &&
            !s
          ) {
            s = true;
            delayModalWindow();
          }
        });
      }

      function showModalRightClick() {
        $(document).contextmenu(function() {
          delayModalWindow();
          return false;
        });
      }

      function showModalSelectedText() {
        $(document).mouseup(function(e) {
          var selected_text =
            (window.getSelection && window.getSelection()) ||
            (document.getSelection && document.getSelection()) ||
            (document.selection &&
              document.selection.createRange &&
              document.selection.createRange().text);
          if (selected_text.toString().length > 2 && Click == 1) {
            delayModalWindow();
          }
        });
      }

      function closeESC() {
        if (settings.closeESC == true) {
          $(window).bind("keydown", function(e) {
            if (e.keyCode == 27) {
              closeModalWindow();
            }
          });
        }
      }

      function videoAutoplay() {
        if (settings.videoSupport == true && settings.videoAutoPlay == true) {
          if (videoSel.length > 0) {
            videoSel.attr("src", videoURL + "?autoplay=1");
          }
        }
      }

      function videoStop() {
        if (
          settings.videoSupport == true &&
          settings.videoStopOnClose == true
        ) {
          if (videoSel.length > 0) {
            videoSel.attr("src", videoURL + "?autoplay=0");
          }
        }
      }

      function modalButtonAnimation() {
        $("." + settings.buttonId).addClass(
          settings.buttonAnimationClass +
            " wow-infinite " +
            settings.buttonAnimation +
            settings.buttonPosition
        );
        var animtime = settings.buttonAnimationTime * 1000;
        setTimeout(function() {
          $("." + settings.buttonId).removeClass(
            settings.buttonAnimationClass +
              " wow-infinite " +
              settings.buttonAnimation +
              settings.buttonPosition
          );
          modalButtonPause();
        }, animtime);
      }

      function modalButtonPause() {
        var animpause = settings.buttonAnimationTime * 1000;
        setTimeout(function() {
          modalButtonAnimation();
        }, animpause);
      }

      function setModalCookie() {
        var days = settings.cookieDays;
        var CookieDate = new Date();
        CookieDate.setTime(CookieDate.getTime() + days * 24 * 60 * 60 * 1000);
        if (days > 0) {
          var site = document.location.host;
          document.cookie =
            settings.cookieName +
            "=yes; path=/; domain=" +
            site +
            "; expires=" +
            CookieDate.toGMTString();
        } else if (days === 0) {
          document.cookie = settings.cookieName + "=yes; path=/;";
        }
      }

      function getModalCookie(name) {
        var matches = document.cookie.match(
          new RegExp(
            "(?:^|; )" +
              name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, "\\$1") +
              "=([^;]*)"
          )
        );
        return matches ? decodeURIComponent(matches[1]) : undefined;
      }
    });
  };
})(jQuery);

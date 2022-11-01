(function ($) {
  $(document).on("ready", function () {
    $(".single-sport-filter-radio-toggle").on("click", function () {
      $(this).parents(".single-sport-filter-radio").toggleClass("active");
      if ($(this).parents(".single-sport-filter-radio").hasClass("active")) {
        $(this).text("-");
      } else {
        $(this).text("+");
      }
    });
    let swiper;
    function sportsSlider() {
      if (window.matchMedia("(max-width: 650px)").matches) {
        swiper = new Swiper(".sports-slider", {
          slidesPerView: 2,

          spaceBetween: 10,
          breakpoints: {
            650: {
              slidesPerView: 1,
            },
          },
        });
      } else {
        if (swiper) {
          swiper.destroy();
        }
      }
    }
    sportsSlider();

    let listvalues = [];

    $(".checkbox-brands").on("change", function () {
      listvalues = $(".checkbox-brands:checked")
        .toArray()
        .map((x) => [
          {
            name: $(x).data("brand_name"),
            id: $(x).data("brand_id"),
          },
        ]);

      let html = `<div id="clear_filter" class="single-sport-filter-tags-item">
      <span>Clear All</span>
      <span class="close"></span>
      </div>`;
      listvalues.forEach((element) => {
        html =
          html +
          `<div data-id="${element[0].id}" class="single-sport-filter-tags-item">
          <span>${element[0].name}</span>
          <span class="close"></span>
          </div>`;
      });

      $(".single-sport-filter-tags-items").html(html);
    });

    $(".checkbox-brands").on("click", function () {
      $(".single-sport-filter-count").html("");
      $("#sports-search-value").val("");

      let tax_id = $(".single-sport-filter-radio").data("tax_id");
      let brandsIds = $("input.checkbox-brands:checked")
        .map(function () {
          return this.value;
        })
        .get();
      if (brandsIds.length == 0) {
        brandsIds = $(".brands-hidden").attr("data-brands").split(",");
      }

      if (brandsIds) {
        $.ajax({
          type: "POST",
          url: "/wp-admin/admin-ajax.php",
          data: {
            action: "sports_by_filter",
            brandsIds,
            tax_id,
          },
          success: function (res) {
            console.log(res);
            $(".single-sport-products-wrapper").html(res);
            $(".single-sport-filter-count").html($(".items-found").text());
            sportsSlider();
          },
          error: function (err) {
            console.error(err);
          },
        });
      }
    });

    $(".filter-search").on("click", function () {
      $(".checkbox-brands").removeAttr("checked");
      $(".single-sport-filter-tags-items").html("");
      let title = $("#sports-search-value").val();
      let tax_id = $("#sports-search-value").data("tax_id");

      if (title) {
        $("#sports-search-value").removeClass("error");
        $.ajax({
          type: "POST",
          url: "/wp-admin/admin-ajax.php",
          data: {
            action: "sports_by_title",
            title,
            tax_id,
          },
          success: function (res) {
            $(".single-sport-products-wrapper").html(res);
            $(".single-sport-products-wrapper").prepend(
              ` <div class="sports-info"><h5>Search by "${title}"</h5></div><p></p>`
            );
            sportsSlider();
          },
          error: function (err) {
            console.error(err);
          },
        });
      } else {
        $("#sports-search-value").addClass("error");
        $("#sports-search-value").focus();
      }
    });

    $("#sports-search-value").on("keyup", function (e) {
      let title = $(this).val();
      let tax_id = $("#sports-search-value").data("tax_id");

      if (e.key === "Enter" || e.keyCode === 13) {
        $(".checkbox-brands").removeAttr("checked");
        $(".single-sport-filter-tags-items").html("");
        if (title) {
          $(this).removeClass("error");
          $.ajax({
            type: "POST",
            url: "/wp-admin/admin-ajax.php",
            data: {
              action: "sports_by_title",
              title,
              tax_id,
            },
            success: function (res) {
              console.log(res);
              $(".single-sport-products-wrapper").html(res);
              $(".single-sport-products-wrapper").prepend(
                ` <div class="sports-info"><h5>Search by "${title}"</h5></div><p></p>`
              );
              sportsSlider();
            },
            error: function (err) {
              console.error(err);
            },
          });
        } else {
          $(this).addClass("error");
          $("#sports-search-value").focus();
        }
      }
    });

    $(".load-more-sports").on("click", function () {
      let _this = $(this);
      _this.html("Loading...");
      let data = {
        action: "sports_loadmore",
        query: _this.attr("data-param-posts"),
        page: this_page,
      };
      $.ajax({
        url: "/wp-admin/admin-ajax.php",
        data: data,
        type: "POST",
        success: function (data) {
          if (data) {
            _this.html(
              `
                <span>View More</span>
                <svg width="87" height="59" viewBox="0 0 87 59" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M60.7071 30.7071C61.0976 30.3166 61.0976 29.6834 60.7071 29.2929L54.3432 22.9289C53.9526 22.5384 53.3195 22.5384 52.9289 22.9289C52.5384 23.3195 52.5384 23.9526 52.9289 24.3431L58.5858 30L52.9289 35.6569C52.5384 36.0474 52.5384 36.6805 52.9289 37.0711C53.3195 37.4616 53.9526 37.4616 54.3432 37.0711L60.7071 30.7071ZM0 31L60 31V29L0 29L0 31Z" fill="white" />
                    <circle opacity="0.8" cx="57.5" cy="29.5" r="29" stroke="#E1FFB1" />
                    <circle opacity="0.8" cx="58" cy="30" r="22.5" stroke="#E1FFB1" />
                </svg>
                `
            );
            _this.prev().before(data);
            sportsSlider();
            this_page++;
            if (this_page == _this.attr("data-max-pages")) {
              _this.remove();
            }
          } else {
            _this.remove();
          }
        },
      });
    });





    $(document).on("click", ".single-sport-filter-tags-item", function () {
      let id = "#checkbox-" + $(this).attr("data-id");
      console.log(id);
      $(id).removeAttr("checked");
      $(this).remove();
      let brandsIds = $("input.checkbox-brands:checked")
      .map(function () {
        return this.value;
      })
      .get();
    if (brandsIds.length == 0) {
      brandsIds = $(".brands-hidden").attr("data-brands").split(",");
    }
      $.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        data: {
          action: "sports_by_filter",
          brandsIds,
        },
        success: function (res) {
          $(".single-sport-products-wrapper").html(res);
          sportsSlider();
          $(".single-sport-filter-count").html($(".items-found").text());
        },
        error: function (err) {
          console.error(err);
        },
      });
      // console.log($('.single-sport-filter-tags-items').length);
    });
    $(document).on("click", "#clear_filter", function () {
      $(".single-sport-filter-count").html("");
      $(".checkbox-brands").removeAttr("checked");
      $(".single-sport-filter-tags-items").html("");
      brandsIds = $(".brands-hidden").attr("data-brands").split(",");
      $.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        data: {
          action: "sports_by_filter",
          brandsIds,
        },
        success: function (res) {
          $(".single-sport-products-wrapper").html(res);
          $(".single-sport-filter-count").html('');
          sportsSlider();
        },
        error: function (err) {
          console.error(err);
        },
      });
    });
  });
})(jQuery);

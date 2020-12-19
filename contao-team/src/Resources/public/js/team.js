
(function ($) {
  $(document).ready(function () {

    $(".ce_xprojects_team_overview .item").each(function (index) {
      var self = $(this);
      $(this).find('div.textcontainer').hide();
      if ('ontouchstart' in document.documentElement) {

        $(this).on('click', function () {

          var current = self.find('div.textcontainer');
          $("div.textcontainer").each(function (index) {
            if ($(this).attr('data-id') !== current.attr('data-id')) {
              $(this).hide();
            }
          });
          current.css('height', self.find('div.imagecontainer').first().height() + "px");
          current.fadeToggle(150);

        });
      } else {
        $(this).hover(function () {
          self.find('div.textcontainer').css('height', self.find('div.imagecontainer').first().height() + "px");
          self.find('div.textcontainer').stop(true).fadeToggle(150);
        });
      }
    });

    $(".ce_xprojects_team_overview .tagselector").each(function () {
      $(this).on('click', function () {
        $(".ce_xprojects_team_overview .tagselector").each(function () {
          $(this).removeClass('active');
        });
        var current = $(this);
        current.addClass('active');
        var tag = current.attr('data-tag');
        $(".ce_xprojects_team_overview .item").each(function () {
          var tagsItems = $(this).attr('data-tags');
          if (tagsItems.includes(tag) || tag === '-') {
            $(this).show();
          } else {
            $(this).hide();
          }
        });
      });
    });

    $("input.searchcontainer_inputtext").each(function () {
      $(this).on('keyup', function () {
        var valSearch = $(this).val();
        $(".ce_xprojects_team_overview .item").each(function () {
          var searchItems = $(this).attr('data-search');
          if (searchItems.includes(valSearch) || valSearch.length < 2 || valSearch === '') {
            $(this).show();
          } else {
            $(this).hide();
          }
        });
      });
    });

    $('.ce_xprojects_team_overview .lazy').lazy({
      effect: "fadeIn",
      effectTime: 1250,
      threshold: 0
    });

  });
})(jQuery);


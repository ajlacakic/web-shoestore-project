var Utils = {
set_to_localstorage: function(key, value) {
    window.localStorage.setItem(key, JSON.stringify(value));
  },
  get_from_localstorage: function(key) {
    return JSON.parse(window.localStorage.getItem(key));
  },
  logout: function() {
    window.localStorage.clear();
    window.location = "login";
  },
  block_ui: function (element) {
    $(element).block({
      message: '<div class="spinner-border text-primary" role="status"></div>',
      css: {
        backgroundColor: "transparent",
        border: "0",
      },
      overlayCSS: {
        backgroundColor: "#000",
        opacity: 0.25,
      },
    });
  },
  unblock_ui: function (element) {
    $(element).unblock({});
  },
};
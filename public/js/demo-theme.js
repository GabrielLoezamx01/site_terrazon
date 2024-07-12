(function (factory) {
    typeof define === "function" && define.amd ? define(factory) : factory();
})(function () {
    "use strict";

    var themeStorageKey = "tablerTheme";
    var defaultTheme = "light";
    var selectedTheme;
    var params = new Proxy(new URLSearchParams(window.location.search), {
        get: function get(searchParams, prop) {
            return searchParams.get(prop);
        },
    });

    // Function to save inputs content
    function saveInputsContent() {
        const inputs = document.querySelectorAll("input, textarea, select");
        const inputContents = {};
        inputs.forEach((input) => {
            inputContents[input.id || input.name] = input.value;
        });
        localStorage.setItem("inputsContent", JSON.stringify(inputContents));
    }

    function restoreInputsContent() {
        const inputContents = JSON.parse(localStorage.getItem("inputsContent"));
        if (inputContents) {
            const inputs = document.querySelectorAll("input, textarea, select");
            inputs.forEach((input) => {
                if (inputContents[input.id || input.name]) {
                    input.value = inputContents[input.id || input.name];
                }
            });
        }
    }

    if (!!params.theme) {
        localStorage.setItem(themeStorageKey, params.theme);
        selectedTheme = params.theme;
    } else {
        var storedTheme = localStorage.getItem(themeStorageKey);
        selectedTheme = storedTheme ? storedTheme : defaultTheme;
    }

    saveInputsContent();

    if (selectedTheme === "dark") {
        document.body.setAttribute("data-bs-theme", selectedTheme);
    } else {
        document.body.removeAttribute("data-bs-theme");
    }

    restoreInputsContent();
});

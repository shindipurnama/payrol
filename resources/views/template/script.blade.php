<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{ asset('asset/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('asset/js/custom/widgets.js') }}"></script>
<script src="{{ asset('asset/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('asset/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{ asset('asset/js/custom/utilities/modals/create-app.js') }}"></script>
<script src="{{ asset('asset/js/custom/utilities/modals/users-search.js') }}"></script>
<!--end::Page Custom Javascript-->
<!--end::Javascript-->

<script>
    function number_format(number, decimals, dec_point, thousands_sep) {
        var nstr = number.toString();
        nstr += '';
        x = nstr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? dec_point + x[1] : '';
        var rgx = /(\d+)(\d{3})/;

        while (rgx.test(x1))
            x1 = x1.replace(rgx, '$1' + thousands_sep + '$2');

        return x1 + x2;
    }

    function autoNumeric(value) {
        var rawValue = null;

        if (value.includes(".")) {
            rawValue = value.split('.').join('');
        } else {
            rawValue = value;
        }

        return convertToNumberFormat(rawValue);
    }

    function convertToNumberFormat(rawValue) {
        var formattedValue = rawValue.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
        var result = formattedValue.split(',').join('.');
        return result;
    }

    function checkNumericInput(keyCode, type) {
        if (keyCode === 8) {
            return true;
        }

        if (type == 1 || type == 2) {
            if ((keyCode > 47 && keyCode < 58) || (keyCode > 95 && keyCode < 106) || keyCode == 189 || keyCode == 173) {
                return true;
            } else {
                return false;
            }
        } else if (type == "decimal") {
            if ((keyCode > 47 && keyCode < 58) || keyCode == 190) {
                return true;
            } else {
                return false
            }

        } else {
            if ((keyCode > 47 && keyCode < 58) || (keyCode > 95 && keyCode < 106)) {
                return true;
            } else {
                return false;
            }
        }
    }

    function checkNumericInputWithZero(keyCode, value, type = "") {
        if (checkNumericInput(keyCode, type)) {
            if (value[0] != 0) {
                return true;
            } else {
                if (keyCode === 8) {
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }

    $("#kt_aside_menu_wrapper a").each(function(index, element) {
        var string = window.location.href
        var substring = $(this).attr('href')
        if ($(this).attr('href') == window.location.href || string.includes(substring)) {
            $(element).parent().parent().addClass("show");
            $(element).parent().parent().addClass("here");
            $(element).addClass("active");
        }
    });
</script>
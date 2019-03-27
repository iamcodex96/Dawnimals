
function countryToData(country) {
    return {
        code: country.alpha2Code,
        nombre: (country.translations.es) ? country.translations.es : country.name
    };
}

function arrayToData(countries) {
    var countriesData = [];
    countries.forEach(function (country) {
        countriesData.push(countryToData(country));
    });

    return countriesData;
}
var url = "https://restcountries.eu/rest/v2/";

var restcountries = {
    defaultCode: "ES",
    urlAll: url + "all",
    urlName: url + "alpha/",
    getAll: function (setData) {
        $.ajax({
            url: this.urlAll,
            dataType: "text",
            success: function (countries) {
                countries = JSON.parse(countries);
                setData(arrayToData(countries));
            },
            error: function (data) {
                var meh = "";
            }
        });
    },
    getCountry: function (code, setData) {
        $.ajax({
            url: this.urlAll,
            method: "get",
            contentType: "text",
            dataType: "text",
            data: code,
            success: function (country) {
                country = JSON.parse(country);
                setData(countryToData(country));
            }
        });
    }
}

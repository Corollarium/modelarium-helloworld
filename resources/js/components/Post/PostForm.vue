<template>
    <form class="modelarium-form" method="POST" @submit.prevent="save">
        <div
            class="form-group"
            data-attribute="title"
            data-datatype="title"
            data-basetype="string"
        >
            <label for="title6" class="formularium-label">
                Title
            </label>
            <input
                id="title6"
                type="text"
                name="title"
                class="form-control"
                data-attribute="title"
                data-datatype="title"
                data-basetype="string"
                maxlength="1024"
                title="Title"
                placeholder="Type here"
                required="required"
                aria-describedby="comment7"
                v-model="model.title"
            />
            <small
                class="formularium-comment form-text text-muted"
                id="comment7"
            >
                Please add a descriptive title
            </small>
        </div>

        <div
            class="form-group"
            data-attribute="content"
            data-datatype="text"
            data-basetype="string"
        >
            <label for="content8" class="formularium-label">
                Content
            </label>
            <textarea
                id="content8"
                type="text"
                name="content"
                class="form-control"
                data-attribute="content"
                data-datatype="text"
                data-basetype="string"
                value=""
                maxlength="1024000"
                title="Content"
                required="required"
                aria-describedby="comment9"
                v-model="model.content"
            >
            </textarea>
            <small
                class="formularium-comment form-text text-muted"
                id="comment9"
            >
                Your post contents
            </small>
        </div>

        <div
            class="form-group"
            data-attribute="country"
            data-datatype="countrycodeiso3"
            data-basetype="choice"
        >
            <label for="country10" class="formularium-label">
                Country
            </label>
            <select
                id="country10"
                name="country"
                class="custom-select"
                data-attribute="country"
                data-datatype="countrycodeiso3"
                data-basetype="choice"
                title="Country"
                aria-describedby="comment11"
                v-model="model.country"
            >
                <option value=""> </option>
                <option value="AFG">
                    Afghanistan
                </option>
                <option value="ALB">
                    Albania
                </option>
                <option value="DZA">
                    Algeria
                </option>
                <option value="ASM">
                    American Samoa
                </option>
                <option value="AND">
                    Andorra
                </option>
                <option value="AGO">
                    Angola
                </option>
                <option value="AIA">
                    Anguilla
                </option>
                <option value="ATA">
                    Antarctica
                </option>
                <option value="ATG">
                    Antigua and Barbuda
                </option>
                <option value="ARG">
                    Argentina
                </option>
                <option value="ARM">
                    Armenia
                </option>
                <option value="ABW">
                    Aruba
                </option>
                <option value="AUS">
                    Australia
                </option>
                <option value="AUT">
                    Austria
                </option>
                <option value="AZE">
                    Azerbaijan
                </option>
                <option value="BHS">
                    Bahamas
                </option>
                <option value="BHR">
                    Bahrain
                </option>
                <option value="BGD">
                    Bangladesh
                </option>
                <option value="BRB">
                    Barbados
                </option>
                <option value="BLR">
                    Belarus
                </option>
                <option value="BEL">
                    Belgium
                </option>
                <option value="BLZ">
                    Belize
                </option>
                <option value="BEN">
                    Benin
                </option>
                <option value="BMU">
                    Bermuda
                </option>
                <option value="BTN">
                    Bhutan
                </option>
                <option value="BOL">
                    Bolivia, Plurinational State of
                </option>
                <option value="BES">
                    Bonaire, Sint Eustatius and Saba
                </option>
                <option value="BIH">
                    Bosnia and Herzegovina
                </option>
                <option value="BWA">
                    Botswana
                </option>
                <option value="BVT">
                    Bouvet Island
                </option>
                <option value="BRA">
                    Brazil
                </option>
                <option value="ATB">
                    British Antarctic Territory
                </option>
                <option value="IOT">
                    British Indian Ocean Territory
                </option>
                <option value="BRN">
                    Brunei Darussalam
                </option>
                <option value="BGR">
                    Bulgaria
                </option>
                <option value="BFA">
                    Burkina Faso
                </option>
                <option value="BUR">
                    Burma, Socialist Republic of the Union of
                </option>
                <option value="BDI">
                    Burundi
                </option>
                <option value="BYS">
                    Byelorussian SSR Soviet Socialist Republic
                </option>
                <option value="CPV">
                    Cabo Verde
                </option>
                <option value="KHM">
                    Cambodia
                </option>
                <option value="CMR">
                    Cameroon
                </option>
                <option value="CAN">
                    Canada
                </option>
                <option value="CTE">
                    Canton and Enderbury Islands
                </option>
                <option value="CYM">
                    Cayman Islands
                </option>
                <option value="CAF">
                    Central African Republic
                </option>
                <option value="TCD">
                    Chad
                </option>
                <option value="CHL">
                    Chile
                </option>
                <option value="CHN">
                    China
                </option>
                <option value="CXR">
                    Christmas Island
                </option>
                <option value="CCK">
                    Cocos (Keeling) Islands
                </option>
                <option value="COL">
                    Colombia
                </option>
                <option value="COM">
                    Comoros
                </option>
                <option value="COG">
                    Congo
                </option>
                <option value="COD">
                    Congo, The Democratic Republic of the
                </option>
                <option value="COK">
                    Cook Islands
                </option>
                <option value="CRI">
                    Costa Rica
                </option>
                <option value="HRV">
                    Croatia
                </option>
                <option value="CUB">
                    Cuba
                </option>
                <option value="CUW">
                    Curaçao
                </option>
                <option value="CYP">
                    Cyprus
                </option>
                <option value="CZE">
                    Czechia
                </option>
                <option value="CSK">
                    Czechoslovakia, Czechoslovak Socialist Republic
                </option>
                <option value="CIV">
                    Côte d'Ivoire
                </option>
                <option value="DHY">
                    Dahomey
                </option>
                <option value="DNK">
                    Denmark
                </option>
                <option value="DJI">
                    Djibouti
                </option>
                <option value="DMA">
                    Dominica
                </option>
                <option value="DOM">
                    Dominican Republic
                </option>
                <option value="ATN">
                    Dronning Maud Land
                </option>
                <option value="TMP">
                    East Timor
                </option>
                <option value="ECU">
                    Ecuador
                </option>
                <option value="EGY">
                    Egypt
                </option>
                <option value="SLV">
                    El Salvador
                </option>
                <option value="GNQ">
                    Equatorial Guinea
                </option>
                <option value="ERI">
                    Eritrea
                </option>
                <option value="EST">
                    Estonia
                </option>
                <option value="SWZ">
                    Eswatini
                </option>
                <option value="ETH">
                    Ethiopia
                </option>
                <option value="FLK">
                    Falkland Islands (Malvinas)
                </option>
                <option value="FRO">
                    Faroe Islands
                </option>
                <option value="FJI">
                    Fiji
                </option>
                <option value="FIN">
                    Finland
                </option>
                <option value="FRA">
                    France
                </option>
                <option value="FXX">
                    France, Metropolitan
                </option>
                <option value="AFI">
                    French Afars and Issas
                </option>
                <option value="GUF">
                    French Guiana
                </option>
                <option value="PYF">
                    French Polynesia
                </option>
                <option value="ATF">
                    French Southern Territories
                </option>
                <option value="GAB">
                    Gabon
                </option>
                <option value="GMB">
                    Gambia
                </option>
                <option value="GEO">
                    Georgia
                </option>
                <option value="DDR">
                    German Democratic Republic
                </option>
                <option value="DEU">
                    Germany
                </option>
                <option value="GHA">
                    Ghana
                </option>
                <option value="GIB">
                    Gibraltar
                </option>
                <option value="GEL">
                    Gilbert and Ellice Islands
                </option>
                <option value="GRC">
                    Greece
                </option>
                <option value="GRL">
                    Greenland
                </option>
                <option value="GRD">
                    Grenada
                </option>
                <option value="GLP">
                    Guadeloupe
                </option>
                <option value="GUM">
                    Guam
                </option>
                <option value="GTM">
                    Guatemala
                </option>
                <option value="GGY">
                    Guernsey
                </option>
                <option value="GIN">
                    Guinea
                </option>
                <option value="GNB">
                    Guinea-Bissau
                </option>
                <option value="GUY">
                    Guyana
                </option>
                <option value="HTI">
                    Haiti
                </option>
                <option value="HMD">
                    Heard Island and McDonald Islands
                </option>
                <option value="VAT">
                    Holy See (Vatican City State)
                </option>
                <option value="HND">
                    Honduras
                </option>
                <option value="HKG">
                    Hong Kong
                </option>
                <option value="HUN">
                    Hungary
                </option>
                <option value="ISL">
                    Iceland
                </option>
                <option value="IND">
                    India
                </option>
                <option value="IDN">
                    Indonesia
                </option>
                <option value="IRN">
                    Iran, Islamic Republic of
                </option>
                <option value="IRQ">
                    Iraq
                </option>
                <option value="IRL">
                    Ireland
                </option>
                <option value="IMN">
                    Isle of Man
                </option>
                <option value="ISR">
                    Israel
                </option>
                <option value="ITA">
                    Italy
                </option>
                <option value="JAM">
                    Jamaica
                </option>
                <option value="JPN">
                    Japan
                </option>
                <option value="JEY">
                    Jersey
                </option>
                <option value="JTN">
                    Johnston Island
                </option>
                <option value="JOR">
                    Jordan
                </option>
                <option value="KAZ">
                    Kazakhstan
                </option>
                <option value="KEN">
                    Kenya
                </option>
                <option value="KIR">
                    Kiribati
                </option>
                <option value="PRK">
                    Korea, Democratic People's Republic of
                </option>
                <option value="KOR">
                    Korea, Republic of
                </option>
                <option value="KWT">
                    Kuwait
                </option>
                <option value="KGZ">
                    Kyrgyzstan
                </option>
                <option value="LAO">
                    Lao People's Democratic Republic
                </option>
                <option value="LVA">
                    Latvia
                </option>
                <option value="LBN">
                    Lebanon
                </option>
                <option value="LSO">
                    Lesotho
                </option>
                <option value="LBR">
                    Liberia
                </option>
                <option value="LBY">
                    Libya
                </option>
                <option value="LIE">
                    Liechtenstein
                </option>
                <option value="LTU">
                    Lithuania
                </option>
                <option value="LUX">
                    Luxembourg
                </option>
                <option value="MAC">
                    Macao
                </option>
                <option value="MDG">
                    Madagascar
                </option>
                <option value="MWI">
                    Malawi
                </option>
                <option value="MYS">
                    Malaysia
                </option>
                <option value="MDV">
                    Maldives
                </option>
                <option value="MLI">
                    Mali
                </option>
                <option value="MLT">
                    Malta
                </option>
                <option value="MHL">
                    Marshall Islands
                </option>
                <option value="MTQ">
                    Martinique
                </option>
                <option value="MRT">
                    Mauritania
                </option>
                <option value="MUS">
                    Mauritius
                </option>
                <option value="MYT">
                    Mayotte
                </option>
                <option value="MEX">
                    Mexico
                </option>
                <option value="FSM">
                    Micronesia, Federated States of
                </option>
                <option value="MID">
                    Midway Islands
                </option>
                <option value="MDA">
                    Moldova, Republic of
                </option>
                <option value="MCO">
                    Monaco
                </option>
                <option value="MNG">
                    Mongolia
                </option>
                <option value="MNE">
                    Montenegro
                </option>
                <option value="MSR">
                    Montserrat
                </option>
                <option value="MAR">
                    Morocco
                </option>
                <option value="MOZ">
                    Mozambique
                </option>
                <option value="MMR">
                    Myanmar
                </option>
                <option value="NAM">
                    Namibia
                </option>
                <option value="NRU">
                    Nauru
                </option>
                <option value="NPL">
                    Nepal
                </option>
                <option value="NLD">
                    Netherlands
                </option>
                <option value="ANT">
                    Netherlands Antilles
                </option>
                <option value="NTZ">
                    Neutral Zone
                </option>
                <option value="NCL">
                    New Caledonia
                </option>
                <option value="NHB">
                    New Hebrides
                </option>
                <option value="NZL">
                    New Zealand
                </option>
                <option value="NIC">
                    Nicaragua
                </option>
                <option value="NER">
                    Niger
                </option>
                <option value="NGA">
                    Nigeria
                </option>
                <option value="NIU">
                    Niue
                </option>
                <option value="NFK">
                    Norfolk Island
                </option>
                <option value="MKD">
                    North Macedonia
                </option>
                <option value="MNP">
                    Northern Mariana Islands
                </option>
                <option value="NOR">
                    Norway
                </option>
                <option value="OMN">
                    Oman
                </option>
                <option value="PCI">
                    Pacific Islands (trust territory)
                </option>
                <option value="PAK">
                    Pakistan
                </option>
                <option value="PLW">
                    Palau
                </option>
                <option value="PSE">
                    Palestine, State of
                </option>
                <option value="PAN">
                    Panama
                </option>
                <option value="PCZ">
                    Panama Canal Zone
                </option>
                <option value="PNG">
                    Papua New Guinea
                </option>
                <option value="PRY">
                    Paraguay
                </option>
                <option value="PER">
                    Peru
                </option>
                <option value="PHL">
                    Philippines
                </option>
                <option value="PCN">
                    Pitcairn
                </option>
                <option value="POL">
                    Poland
                </option>
                <option value="PRT">
                    Portugal
                </option>
                <option value="PRI">
                    Puerto Rico
                </option>
                <option value="QAT">
                    Qatar
                </option>
                <option value="ROU">
                    Romania
                </option>
                <option value="RUS">
                    Russian Federation
                </option>
                <option value="RWA">
                    Rwanda
                </option>
                <option value="REU">
                    Réunion
                </option>
                <option value="BLM">
                    Saint Barthélemy
                </option>
                <option value="SHN">
                    Saint Helena, Ascension and Tristan da Cunha
                </option>
                <option value="KNA">
                    Saint Kitts and Nevis
                </option>
                <option value="LCA">
                    Saint Lucia
                </option>
                <option value="MAF">
                    Saint Martin (French part)
                </option>
                <option value="SPM">
                    Saint Pierre and Miquelon
                </option>
                <option value="VCT">
                    Saint Vincent and the Grenadines
                </option>
                <option value="WSM">
                    Samoa
                </option>
                <option value="SMR">
                    San Marino
                </option>
                <option value="STP">
                    Sao Tome and Principe
                </option>
                <option value="SAU">
                    Saudi Arabia
                </option>
                <option value="SEN">
                    Senegal
                </option>
                <option value="SRB">
                    Serbia
                </option>
                <option value="SCG">
                    Serbia and Montenegro
                </option>
                <option value="SYC">
                    Seychelles
                </option>
                <option value="SLE">
                    Sierra Leone
                </option>
                <option value="SKM">
                    Sikkim
                </option>
                <option value="SGP">
                    Singapore
                </option>
                <option value="SXM">
                    Sint Maarten (Dutch part)
                </option>
                <option value="SVK">
                    Slovakia
                </option>
                <option value="SVN">
                    Slovenia
                </option>
                <option value="SLB">
                    Solomon Islands
                </option>
                <option value="SOM">
                    Somalia
                </option>
                <option value="ZAF">
                    South Africa
                </option>
                <option value="SGS">
                    South Georgia and the South Sandwich Islands
                </option>
                <option value="SSD">
                    South Sudan
                </option>
                <option value="RHO">
                    Southern Rhodesia
                </option>
                <option value="ESP">
                    Spain
                </option>
                <option value="LKA">
                    Sri Lanka
                </option>
                <option value="SDN">
                    Sudan
                </option>
                <option value="SUR">
                    Suriname
                </option>
                <option value="SJM">
                    Svalbard and Jan Mayen
                </option>
                <option value="SWE">
                    Sweden
                </option>
                <option value="CHE">
                    Switzerland
                </option>
                <option value="SYR">
                    Syrian Arab Republic
                </option>
                <option value="TWN">
                    Taiwan, Province of China
                </option>
                <option value="TJK">
                    Tajikistan
                </option>
                <option value="TZA">
                    Tanzania, United Republic of
                </option>
                <option value="THA">
                    Thailand
                </option>
                <option value="TLS">
                    Timor-Leste
                </option>
                <option value="TGO">
                    Togo
                </option>
                <option value="TKL">
                    Tokelau
                </option>
                <option value="TON">
                    Tonga
                </option>
                <option value="TTO">
                    Trinidad and Tobago
                </option>
                <option value="TUN">
                    Tunisia
                </option>
                <option value="TUR">
                    Turkey
                </option>
                <option value="TKM">
                    Turkmenistan
                </option>
                <option value="TCA">
                    Turks and Caicos Islands
                </option>
                <option value="TUV">
                    Tuvalu
                </option>
                <option value="PUS">
                    US Miscellaneous Pacific Islands
                </option>
                <option value="SUN">
                    USSR, Union of Soviet Socialist Republics
                </option>
                <option value="UGA">
                    Uganda
                </option>
                <option value="UKR">
                    Ukraine
                </option>
                <option value="ARE">
                    United Arab Emirates
                </option>
                <option value="GBR">
                    United Kingdom
                </option>
                <option value="USA">
                    United States
                </option>
                <option value="UMI">
                    United States Minor Outlying Islands
                </option>
                <option value="HVO">
                    Upper Volta, Republic of
                </option>
                <option value="URY">
                    Uruguay
                </option>
                <option value="UZB">
                    Uzbekistan
                </option>
                <option value="VUT">
                    Vanuatu
                </option>
                <option value="VEN">
                    Venezuela, Bolivarian Republic of
                </option>
                <option value="VNM">
                    Viet Nam
                </option>
                <option value="VDR">
                    Viet-Nam, Democratic Republic of
                </option>
                <option value="VGB">
                    Virgin Islands, British
                </option>
                <option value="VIR">
                    Virgin Islands, U.S.
                </option>
                <option value="WAK">
                    Wake Island
                </option>
                <option value="WLF">
                    Wallis and Futuna
                </option>
                <option value="ESH">
                    Western Sahara
                </option>
                <option value="YEM">
                    Yemen
                </option>
                <option value="YMD">
                    Yemen, Democratic, People's Democratic Republic of
                </option>
                <option value="YUG">
                    Yugoslavia, Socialist Federal Republic of
                </option>
                <option value="ZAR">
                    Zaire, Republic of
                </option>
                <option value="ZMB">
                    Zambia
                </option>
                <option value="ZWE">
                    Zimbabwe
                </option>
                <option value="ALA">
                    Åland Islands
                </option>
            </select>
            <div class="formularium-comment" id="comment11">
                Pick a country
            </div>
        </div>

        <button type="submit" class="btn btn-primary">
            Submit
        </button>
    </form>
</template>

<script>
import axios from "axios";
import mutationUpsert from "raw-loader!./mutationUpsert.graphql";
import itemQuery from "raw-loader!./queryItem.graphql";
import model from "./model";

export default {
    data() {
        return {
            model: model,
        };
    },

    created() {
        if (this.$route.params.id) {
            this.get(this.$route.params.id);
        }
    },

    methods: {
        get(id) {
            axios
                .post("/graphql", {
                    query: itemQuery,
                    variables: { id },
                })
                .then((result) => {
                    if (result.data.errors) {
                        // TODO
                        console.error(result.data.errors);
                        return;
                    }
                    const data = result.data.data;
                    this.$set(this, "model", data.post);
                });
        },

        save() {
            let postData = { ...this.model };
            let query;

            axios
                .post("/graphql", {
                    query: mutationUpsert,
                    variables: { post: postData },
                })
                .then((result) => {
                    if (result.data.errors) {
                        // TODO
                        console.error("errors", result.data.errors);
                        return;
                    }
                    const data = result.data.data;
                    this.$router.push("/post/" + data.upsertPost.id);
                });
        },

        changedFile(name, event) {
            // TODO
        },
    },
};
</script>
<style></style>

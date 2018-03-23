<html>
<head>
    <style>
        #popboxLocationApp {
            min-width: 320px;
            text-align: left;
        }
        #popboxLocationApp .maps .locations {
            border: 1px solid #dadada;
            border-radius: 4px;
            margin-top: .5em;
            max-height: 240px;
            overflow-y: auto;
        }
        #popboxLocationApp .maps .locations .location {
            padding: 1em;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            line-height: 1.2em;
            border-bottom: 1px solid #f3f3f3;
            margin-bottom: 0;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start;
        }
        #popboxLocationApp .maps .locations .active{
            background: #eee;
        }
        #popboxLocationApp .maps .locations .location .block {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            font-size: .9em;
        }
        #popboxLocationApp .maps .locations .location input[type="radio"] {
            margin-top: .2em;
            margin-right: .7em;
            height: inherit;
        }

        .tab-content .tab-pane {
            display: none;
        }
        .tab-content .active {
            display: block;
        }
        .nav-tabs {
            margin-top: 20px;
            border-bottom: 2px solid #DDD; }
        .nav-tabs > li {
            position: relative;
            display: table-cell;
            width: 1%;
            float: none;
        }
        .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }
        .nav-tabs > li > a { border: none; color: #666; padding: 5px; }
        .nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none; color: #4285F4 !important; background: transparent; }
        .nav-tabs > li > a::after { content: ""; background: #4285F4; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
        .nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
        .tab-nav > li > a::after { background: #21527d none repeat scroll 0% 0%; color: #fff; }
        .tab-pane { padding: 15px 0; }
        .tab-content{padding:20px}
    </style>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
<!-- Nav tabs -->
<div class="card">
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#popbox" aria-controls="profile" role="tab" data-toggle="tab">Popbox Pickup</a>
        </li>
        <li role="presentation">
            <a href="#home" aria-controls="home" role="tab" data-toggle="tab">To Address</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="popbox">
            <div class="maps">
                <div>
                    <input type="hidden" id="addres1">
                    <input type="hidden" id="addres2">
                    <input type="hidden" id="city">
                    <input type="hidden" id="country">
                    <input type="hidden" id="province">
                    <input type="hidden" id="zipcode">
                    <input type="hidden" id="popboxValidation">
                </div>
                @if($cities)
                    <select name="search" id="valueSearch">
                        @php
                            $collection = collect($cities);
                            $sorted = $collection->sort();
                            $cities = $sorted->values()->all();
                        @endphp
                        @foreach($cities as $city)
                            <option value="{{$city}}">{{$city}}</option>
                        @endforeach
                    </select>
                @endif

                <div class="locations">
                    @if($lockers)
                        @foreach($lockers as $locker_)
                            <div id="location_" class="location clearfix">
                                <input name="location_id"
                                       class="locationRadio"
                                       value="{{$locker_->locker_id}}"
                                       type="radio"
                                       data-address1="{{$locker_->name}}"
                                       data-address2="{{$locker_->address_detail}}"
                                       data-city="{{$locker_->city}}"
                                       data-country="{{$locker_->country}}"
                                       data-province="{{$locker_->province}}"
                                       data-zip_code="{{$locker_->zip_code}}"
                                >
                                <span class="block">
                                    <span>
                                        <strong>{{$locker_->name}}</strong>
                                    </span>
                                    <span>
                                        {{$locker_->address}}<br>
                                        {{$locker_->address_detail}} <br>
                                        {{$locker_->operational_hour}}
                                    </span>
                                    <span>

                                    </span>
                                </span>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div role="tabpanel" class="tab-pane" id="home">
            Please click the checkout button to continue without Popbox Locker.
        </div>

    </div>
</div>

<script>
    $('#valueSearch').change(function (e) {
        var value = $(this).val()
        var lockers= [];
        $.ajax({
            url: "https://5e400a17.ngrok.io//maps-filter/"+value,
            beforeSend: function() {
                $('.locations').html('<div>Loading...</div>');
            },
            success: function (lockers) {
                var tagHtml = '';
                $.each(JSON.parse(lockers), function (i, item) {
                    tagHtml += '<div id="location_" class="location clearfix">';
                    tagHtml += '<input name="location_id"' +
                        'class="locationRadio"' +
                        'onclick="setValue(this)" '+
                        'value="' + item.locker_id + '"' +
                        'type="radio"' +
                        'data-address1="' + item.name + '"' +
                        'data-address2="' + item.address_detail + '"' +
                        'data-city="' + item.city + '"' +
                        'data-country="' + item.country + '"' +
                        'data-province="' + item.province + '"' +
                        'data-zip_code="' + item.zip_code + '"' +
                        '/>';

                    tagHtml += '<span class="block">' +
                        '<span>' +
                        '    <strong>' + item.name + '</strong>' +
                        '</span>' +
                        '<span>' +
                        item.address + '<br>' +
                        item.address_detail + ' <br>' +
                        item.operational_hour +
                        '</span>' +
                        '<span>' +
                        '</span>' +
                        '</span>'
                    tagHtml += '</div>';
                });
                $('.locations').html(tagHtml);
            }
        })
    })

    function setValue(e) {
        var w = $('#popboxValidation').val('withPopbox');
        $(e).parent('.location').toggleClass('active').siblings().removeClass('active')
        var address1 = $(e).data('address1')
        $('#addres1').val(address1)

        var address2 = $(e).data('address2')
        $('#addres2').val(address2)

        var city = $(e).data('city')
        $('#city').val(city)

        var country = $(e).data('country')
        $('#country').val(country)

        var province = $(e).data('province')
        $('#province').val(province)

        var zipcode = $(e).data('zip_code')
        $('#zipcode').val(zipcode)

    }

    $('.location').click(function (e) {
        $(this).toggleClass('active').siblings().removeClass('active')
        var radio = $(this).find('.locationRadio')
        radio.prop("checked", true)
        /*Set value input hidden attribute checkout*/
        var w = $('#popboxValidation').val('withPopbox');
        var address1 = radio.data('address1')
        $('#addres1').val(address1)

        var address2 = radio.data('address2')
        $('#addres2').val(address2)

        var city = radio.data('city')
        $('#city').val(city)

        var country = radio.data('country')
        $('#country').val(country)

        var province = radio.data('province')
        $('#province').val(province)

        var zipcode = radio.data('zip_code')
        $('#zipcode').val(zipcode)
    });

    $(document).ready(function() {
        $(document).on("click", '[name="checkout"], [href="/checkout"], form[action="/checkout"] input[type="submit"], .checkout_button', function (t) {
            var withPopbox = $('#popboxValidation').val();
            if(withPopbox == 'withPopbox') {
                var address1 = $('#addres1').val()
                var address2 = $('#addres2').val()
                var city = $('#city').val()
                var country = $('#country').val()
                var province = $('#province').val()
                var zipcode = $('#zipcode').val()
                var n = "?checkout[shipping_address][address1]=" + address1 +
                    "&checkout[shipping_address][address2]=" + address2 +
                    "&checkout[shipping_address][city]=" + city +
                    "&checkout[shipping_address][country]=" + country +
                    "&checkout[shipping_address][province]=" + province +
                    "&checkout[shipping_address][zip]=" + zipcode
                $('form[action^="/cart"]').attr("action", n)
            }
        });
    var e = this;
    })

</script>
</body>
</html>
<script>
    let mapData = [];
    let indexSelected;
    let map;
    let defaultMapSingleData = {
        "image": "",
        "map_url": ""
    };

    function populateMap() {
        let htmlJoinMapData = mapData.map((x, index) => {
            return `
                <div class="row mx-auto px-0 align-items-end mt-1">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="" class="mb-0">Image</label>
                            <input type="file" class="form-control">
                        </div>
                    </div>
                    <div style="flex: 1">
                        <div class="form-group">
                            <label for="" class="mb-0">Specific Location</label>
                            <input type="text" placeholder="Click here to open map" value="${x.map_url}" data-index="${index}" class="form-control specific_location_map" readonly>
                        </div>
                    </div>
                    <div class="col-1 mb-2 d-flex justify-conten-center">
                        <i class="bi bi-x-lg"></i>
                    </div>
                </div>
            `;
        }).join('');

        $(".divDataClone").html(htmlJoinMapData);
    }

    function initialMapHtml() {
        mapData.push(defaultMapSingleData);
        populateMap();
    }

    initialMapHtml();

    function showMap() {
        const tibiaoCoords = [11.2784, 122.0421];

        map = L.map('mapIncident').setView(tibiaoCoords, 20);

        L.tileLayer('https://{s}.basemaps.cartocdn.com/light_nolabels/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/">CARTO</a>',
            subdomains: 'abcd',
            maxZoom: 18
        }).addTo(map);

        L.tileLayer('https://{s}.basemaps.cartocdn.com/light_only_labels/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/">CARTO</a>',
            subdomains: 'abcd',
            maxZoom: 18,
            pane: 'overlayPane'
        }).addTo(map);

        // Custom Icon
        const customIcon = L.icon({
            iconUrl: '{{ asset('assets/images/marker-icon.png') }}',
            iconSize: [28, 38],
            iconAnchor: [19, 38],
            popupAnchor: [0, -35]
        });

        // Default Marker
        let marker = L.marker(tibiaoCoords, {
                icon: customIcon,
                draggable: true
            })
            .addTo(map)
            .bindPopup("<b>Tibiao, Antique</b><br>Drag or click map to change marker.")
            .openPopup();

        map.on('click', function(e) {
            const {
                lat,
                lng
            } = e.latlng;
            marker.setLatLng([lat, lng])
                .bindPopup(`📍 Pinned at:<br>${lat.toFixed(5)}, ${lng.toFixed(5)}`)
                .openPopup();
        });

        L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles &copy; Esri &mdash; Source: Esri, Earthstar Geographics, etc.'
        }).addTo(map);

        L.Control.geocoder({
                defaultMarkGeocode: false
            })
            .on('markgeocode', function(e) {
                const bbox = e.geocode.bbox;
                const center = e.geocode.center;

                marker.setLatLng(center)
                    .bindPopup(`📍 ${e.geocode.name}<br>${center.lat.toFixed(5)}, ${center.lng.toFixed(5)}`)
                    .openPopup();

                map.fitBounds(bbox);
            })
            .addTo(map);
    }

    $('#incidentMapSelect').on('click', function() {
        const center = map.getCenter();
        const lat = center.lat;
        const lng = center.lng;
        let findData = mapData[indexSelected];
        if (findData) {
            findData.map_url = `${lat}, ${lng}`;
            populateMap();
            $(".mapModal").modal("hide");
        }
    });

    $(document).on("click", ".specific_location_map", function() {
        indexSelected = $(this).data("index");
        $(".mapModal").modal("show");
    })

    $(document).on("show.bs.modal", ".mapModal", function() {
        setTimeout(() => {
            showMap();
        }, 500);
    })
</script>

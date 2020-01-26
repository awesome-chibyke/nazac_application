   <script src="<?php print base_url();?>resource/js/jquery.min.js"></script>
    <script src="<?php print base_url();?>resource/js/jquery-ui.js"></script>
    <script src="<?php print base_url();?>resource/js/tether.min.js"></script>
    <script src="<?php print base_url();?>resource/js/moment.js"></script>
    <script src="<?php print base_url();?>resource/js/transition.min.js"></script>
    <script src="<?php print base_url();?>resource/js/bootstrap.min.js"></script>
    
    <script src="<?php print base_url();?>resource/js/fitvids.js"></script>
    <script src="<?php print base_url();?>resource/js/jquery.waypoints.min.js"></script>
    <script src="<?php print base_url();?>resource/js/jquery.counterup.min.js"></script>
    <script src="<?php print base_url();?>resource/js/imagesloaded.pkgd.min.js"></script>
    <!--<script src="<?php print base_url();?>resource/js/isotope.pkgd.min.js"></script>-->
    <script src="<?php print base_url();?>resource/js/smooth-scroll.min.js"></script>
    <script src="<?php print base_url();?>resource/js/lightcase.js"></script>
    
    <script src="<?php print base_url();?>resource/js/range-slider.js"></script>
	<script src="<?php print base_url();?>resource/js/light.js"></script>
	<script src="<?php print base_url();?>resource/js/popup.js"></script>
	<script src="<?php print base_url();?>resource/js/inner.js"></script>
    
    <!--<script src="<?php print base_url();?>resource/js/search.js"></script>-->
    <script src="<?php print base_url();?>resource/js/owl.carousel.js"></script>
    <script src="<?php print base_url();?>resource/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php print base_url();?>resource/js/ajaxchimp.min.js"></script>
    <script src="<?php print base_url();?>resource/js/newsletter.js"></script>
    <script src="<?php print base_url();?>resource/js/jquery.form.js"></script>
    <script src="<?php print base_url();?>resource/js/jquery.validate.min.js"></script>
    <script src="<?php print base_url();?>resource/js/searched.js"></script>
    <script src="<?php print base_url();?>resource/js/forms-2.js"></script>
    <script src="<?php print base_url();?>resource/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="<?php print base_url();?>resource/revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script src="<?php print base_url();?>resource/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="<?php print base_url();?>resource/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
    <script src="<?php print base_url();?>resource/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="<?php print base_url();?>resource/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="<?php print base_url();?>resource/revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="<?php print base_url();?>resource/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="<?php print base_url();?>resource/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="<?php print base_url();?>resource/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="<?php print base_url();?>resource/revolution/js/extensions/revolution.extension.video.min.js"></script>
	<script src="<?php print base_url();?>resource/js/croppie.js"></script>
    <script>
        var tpj = jQuery;
        var revapi486;
        tpj(document).ready(function() {
            if (tpj("#rev_slider_one").revolution == undefined) {
                revslider_showDoubleJqueryError("#rev_slider_one");
            } else {
                revapi486 = tpj("#rev_slider_one").show().revolution({
                    sliderType: "standard",
                    jsFileLocation: "plugins/revolution/js/",
                    sliderLayout: "fullwidth",
                    dottedOverlay: "yes",
                    delay: 10000,
                    navigation: {
                        keyboardNavigation: "off",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation: "off",
                        mouseScrollReverse: "default",
                        onHoverStop: "off",
                        touch: {
                            touchenabled: "on",
                            touchOnDesktop: "off",
                            swipe_threshold: 75,
                            swipe_min_touches: 1,
                            swipe_direction: "horizontal",
                            drag_block_vertical: false
                        },
                        arrows: {
                            style: "metis",
                            enable: true,
                            hide_onmobile: true,
                            hide_under: 600,
                            hide_onleave: true,
                            tmp: '',
                            left: {
                                h_align: "left",
                                v_align: "center",
                                h_offset: 0,
                                v_offset: 0
                            },
                            right: {
                                h_align: "right",
                                v_align: "center",
                                h_offset: 0,
                                v_offset: 0
                            }
                        }

                    },
                    responsiveLevels: [1200, 1040, 778, 480],
                    visibilityLevels: [1200, 1040, 778, 480],
                    gridwidth: [1170, 1040, 778, 600],
                    gridheight: [850, 850, 850, 950],
                    lazyType: "none",
                    parallax: {
                        type: "scroll",
                        origo: "enterpoint",
                        speed: 400,
                        levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 46, 47, 48, 49, 50, 55]
                    },
                    shadow: 0,
                    spinner: "off",
                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle: "off",
                    autoHeight: "off",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        nextSlideOnWindowFocus: "off",
                        disableFocusListener: false,
                    }
                });
            }
        }); /*ready*/

    </script>
    <!-- MAIN JS -->
    <script src="<?php print base_url();?>resource/js/script.js"></script>
    <script src="<?php print base_url();?>resource/toast/jquery.toast.js"></script>
    <script src="<?php print base_url();?>resource/toast/toast-functions.js"></script>
    <script src="<?php print base_url();?>resource/js/function.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRx-5dI53OVWhy_yb9n8N0Txlz4JWva6k&callback=my_map_add"></script>
    
   <script>
		var myChart = document.getElementById('myChart').getContext('2d');
		Chart.defaults.global.defulatFontFamily = 'Lato';
		Chart.defaults.global.defulatFontSize = '16px';
		Chart.defaults.global.defulatFontFColor = '#333';
		var barChart = new Chart(myChart, {
			type: 'bar',
			data: {
				labels: ['Views','Registered Property','Property Listing','Booked Property',''],
				datasets: [{
					label: 'Statistics',
					data: [
						<?php print @$viewed_property;?>, <?php print @$totla_registered_property;?>, <?php print @$totla_listed_property;?>, <?php print @$totla_booked_agent_property;?>, 0
					],
					backgroundColor: ['#7ae7f0','#e4e0c5','#e6ffb3','#ffc2b3'],
					borderWidth: 2,
					borderColor: '#ccc',
					hoverBorderWidth: 2,
					hoverBorderColor: '#333'
				}]
			},
			options: {
				title:{
					display: true,
					text: 'Statistics of all activities on Viewed Properties, Registered Property, Property Listing, Booked Properties' 
				} 
				
			}
		});
	</script>
	<script src="<?php print base_url();?>resource/css/datatables/datatables.min.js"></script>
	<script>
    $(function() {
		
		$(document).ready(function() {
        $('#FlagsExport').DataTable({
            "pageLength": 50,
            dom: 'Bfrtip',
				buttons: ['copy','csv','excel','pdf','print']
			});
		});
        $('#myTable').DataTable();
		
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary m-r-10');
    </script>
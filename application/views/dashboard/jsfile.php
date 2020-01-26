<input type="hidden" class="page_no_holder" />

<script>

    var baseurl = '<?php echo base_url(); ?>';

    //create a large modal
    $(".modal-dialog").addClass('modal-lg');

    function getLocalGovernment(a){

        var $state = $(a).val();

        if($state=='Abia'){
            var location1 = ['Aba North','Aba South','Arochukwu','Bende','Ikwuano','Isiala Ngwa North','Isiala Ngwa South','Isiukwuato','Obi Ngwa','Ohafia','Osisioma Ngwa','Ugwunagbo','Ukwa East','Ukwa West','Umuahia North','Umuahia South','Umunneochi'];
        }else if($state=='Adamawa'){
            var location1 = ['Demsa','Fufore','Ganaye','Gireri','Gombi','Guyuk','Hong','Jada','Lamurde','Madagali','Maiha','Mayo-Belwa','Michika','Mubi North','Mubi South','Numan','Shelleng','Song','Toungo'];
        }else if($state=='Akwaibom'){
            var location1 = ['Abak','Eastern Obolo','Eket','Esit Eket','Essien Udim','Etim Ekpo','Etinan','Ibeno','Ibesikpo Asutan','Ibiono Ibom','Ika','Ikono','Ikot Abasi','Ikot Ekpene','Ini','Itu','Mbo','Mkpat Enin','Nsit Atai','Nsit Ibom','Nsit Ubium','Obot Akara','Okobo','Onna','Oron','Oruk Anam','Udung Uko','Ukanafun','Uruan','Urue-Offong/Oruko','Uyo'];
        }else if($state=='Anambra'){
            var location1 = ['Anambra East','Anambra West','Anaocha','Awka North','Ayamelum','Dunukofia','Ekwusigo','Idemili North','Idemili south','Ihiala','Njikoka','Nnewi North','Nnewi South','Ogbaru','Onitsha North','Onitsha South','Orumba North','Orumba South','Oyi'];
        }else if($state=='Bauchi'){
            var location1 = ['Alkaleri','Bauchi','Bogoro','Damban','Darazo','Dass','Ganjuwa','Giade','Itas/Gadau','Jama’are','Katagum','Kirfi','Misau','Ningi','Shira','Tafawa-Balewa','Toro','Warji','Zaki'];
        }else if($state=='Bayelsa'){
            var location1 = ['Brass','Ekeremor','Kolokuma/Opokuma','Nembe','Ogbia','Sagbama','Southern Jaw','Yenegoa'];
        }else if($state=='Benue'){
            var location1 = ['Ado','Agatu','Apa','Buruku','Gboko','Guma','Gwer East','Gwer West','Katsina-Ala','Konshisha','Kwande','Logo','Makurdi','Obi','Ogbadibo','Oju','Okpokwu','Ohimini','Oturkpo','Tarka','Ukum','Ushongo','Vandeikya'];
        }else if($state=='Borno'){
            var location1 = ['Askira/Uba','Bama','Bayo','Biu','Chibok','Damboa','Dikwa','Gubio','Guzamala','Gwoza','Hawul','Jere','Kaga','Kala/Balge','Konduga','Kukawa','Kwaya Kusar','Mafa','Magumeri','Maiduguri','Marte','Mobbar','Monguno','Ngala','Nganzai','Shani'];
        }else if($state=='CrossRiver'){
            var location1 = ['Akpabuyo','Odukpani','Akamkpa','Biase','Abi','Ikom','Yarkur','Odubra','Boki','Ogoja','Yala','Obanliku','Obudu','Calabar South','Etung','Bekwara','Bakassi','Calabar Municipality'];
        }else if($state=='Delta'){
            var location1 = ['Oshimili','Aniocha','Aniocha South','Ika South','Ika North-East','Ndokwa West','Ndokwa East','Isoko south','Isoko North','Bomadi','Burutu','Ughelli South','Ughelli North','Ethiope West','Ethiope East','Sapele','Okpe','Warri North','Warri South','Uvwie','Udu','Warri Central','Ukwani','Oshimili North','Patani'];
        }else if($state=='Ebonyi'){
            var location1 = ['Afikpo South','Afikpo North','Onicha','Ohaozara','Abakaliki','Ishielu','lkwo','Ezza','Ezza South','Ohaukwu','Ebonyi','Ivo'];
        }else if($state=='Edo'){
            var location1 = ['Esan North-East','Esan Central','Esan West','Egor','Ukpoba','Central','Etsako Central','Igueben','Oredo','Ovia SouthWest','Ovia South-East','Orhionwon','Uhunmwonde','Etsako East','Esan South-East'];
        }else if($state=='Ekiti'){
            var location1 = ['Ado','Ekiti-East','Ekiti-West','Emure/Ise/Orun','Ekiti South-West','Ikare','Irepodun','Ijero','Ido/Osi','Oye','Ikole','Moba','Gbonyin','Efon','Ise/Orun','Ilejemeje'];
        }else if($state=='Enugu'){
            var location1 = ['Enugu South','Igbo-Eze South','Enugu North','Nkanu','Udi','Agwu','Oji-River','Ezeagu','IgboEze North','Isi-Uzo','Nsukka','Igbo-Ekiti','Uzo-Uwani','Enugu East','Aninri','Nkanu East','Udenu'];
        }else if($state=='Gombe'){
            var location1 = ['Akko','Balanga','Billiri','Dukku','Kaltungo','Kwami','Shomgom','Funakaye','Gombe','Nafada/Bajoga','Yamaltu/Delta'];
        }else if($state=='Imo'){
            var location1 = ['Aboh-Mbaise','Ahiazu-Mbaise','Ehime-Mbano','Ezinihitte','Ideato North','Ideato South','Ihitte/Uboma','Ikeduru','Isiala Mbano','Isu','Mbaitoli','Mbaitoli','Ngor-Okpala','Njaba','Nwangele','Nkwerre','Obowo','Oguta','Ohaji/Egbema','Okigwe','Orlu','Orsu','Oru East','Oru West','Owerri-Municipal','Owerri North','Owerri West'];
        }else if($state=='Jigawa'){
            var location1 = ['Aujara','Auyo','Babura','Birnin Kudu','Birniwa','Buji','Dutse','Gagarawa','Garki','Gumel','Guri','Gwaram','Gwiwa','Hadejia','kafin Hausa','Jahun','kafin Hausa','Kaugama Kazaure','Kiri Kasamma','Kiyawa','Maigatari','Malam Madori','Miga','Ringim','Roni','Sule-Tankarkar','Taura','Yankwashi'];
        }else if($state=='Kaduna'){
            var location1 = ['Birni-Gwari','Chikun','Giwa','Igabi','Ikara','jaba','Jemaa','Kachia','Kaduna North','Kaduna South','Kagarko','Kajuru','Kaura','Kauru','Kubau','Kudan','Lere','Makarfi','Sabon-Gari','Sanga','Soba','Zango-Kataf','Zaria'];
        }else if($state=='Kano'){
            var location1 = ['Ajingi','Albasu','Bagwai','Bebeji','Bichi','Bunkure','Dala','Dambatta','Dawakin Kudu','Dawakin Tofa','Doguwa','Fagge','Gabasawa','Garko','Garum','Mallam','Gaya','Gezawa','Gwale','Gwarzo','Kabo','Kano Municipal','Karaye','Kibiya','Kiru','kumbotso','Kunchi','Kura','Madobi','Makoda','Minjibir','Nasarawa','Rano','Rimin Gado','Rogo','Shanono','Sumaila','Takali','Tarauni','Tofa','Tsanyawa','Tudun Wada','Ungogo','Warawa','Wudil'];
        }else if($state=='Kastina'){
            var location1 = ['Bakori','Batagarawa','Batsari','Baure','Bindawa','Charanchi','Dandume','Danja','Dan Musa','Daura','Dutsi','Dutsin-Ma','Faskari','Funtua','Ingawa','Jibia','Kafur','Kaita','Kankara','Kankia','Katsina','Kurfi','Kusada','MaiAdua','Malumfashi','Mani','Mashi','Matazuu','Musawa','Rimi','Sabuwa','Safana','Sandamu','Zango'];
        }else if($state=='Kebbi'){
            var location1 = ['Aleiro','Arewa-Dandi','Argungu','Augie','Bagudo','Birnin Kebbi','Bunza','Dandi','Fakai','Gwandu','Jega','Kalgo','Koko/Besse','Maiyama','Ngaski','Sakaba','Shanga','Suru','Wasagu/Danko','Yauri','Zuru'];
        }else if($state=='Kogi'){
            var location1 = ['Adavi','Ajaokuta','Ankpa','Bassa','Dekina','Ibaji','Idah','Igalamela-Odolu','Ijumu','Kabba/Bunu','Kogi','Lokoja','Mopa-Muro','Ofu','Ogori/Mangongo','Okehi','Okene','Olamabolo','Omala','Yagba East','Yagba West'];
        }else if($state=='Kwara'){
            var location1 = ['Asa','Baruten','Edu','Ekiti','Ifelodun','Ilorin East','Ilorin West','Irepodun','Isin','Kaiama','Moro','Offa','Oke-Ero','Oyun','Pategi'];
        }else if($state=='Lagos'){
            var location1 = ['Agege','Ajeromi-Ifelodun','Alimosho','Amuwo-Odofin','Apapa','Badagry','Epe','Eti-Osa','Ibeju/Lekki','Ifako-Ijaye','Ikeja','Ikorodu','Kosofe','Lagos Island','Lagos Mainland','Mushin','Ojo','Oshodi-Isolo','Shomolu','Surulere'];
        }else if($state=='Nasarawa'){
            var location1 = ['Akwanga','Awe','Doma','Karu','Keana','Keffi','Kokona','Lafia','Nasarawa','Nasarawa-Eggon','Obi','Toto','Wamba'];
        }else if($state=='Niger'){
            var location1 = ['Agaie','Agwara','Bida','Borgu','Bosso','Chanchaga','Edati','Gbako','Gurara','Katcha','Kontagora','Lapai','Lavun','Magama','Mariga','Mashegu','Mokwa','Muya','Pailoro','Rafi','Rijau','Shiroro','Suleja','Tafa','Wushishi'];
        }else if($state=='Ogun'){
            var location1 = ['Abeokuta North','Abeokuta South','Ado-Odo/Ota','Egbado North','Egbado South','Ewekoro','Ifo','Ijebu East','Ijebu North','Ijebu North East','Ijebu Ode','Ikenne','Imeko-Afon','Ipokia','Obafemi-Owode','Ogun Waterside','Odeda','Odogbolu','Remo North','Shagamu'];
        }else if($state=='Ondo'){
            var location1 = ['Akoko North East','Akoko North West','Akoko South Akure East','Akoko South West','Akure North','Akure South','Ese-Odo','Idanre','Ifedore','Ilaje','Ile-Oluji','Okeigbo','Irele','Odigbo','Okitipupa','Ondo East','Ondo West','Ose','Owo'];
        }else if($state=='Osun'){
            var location1 = ['Aiyedade','Aiyedire','Atakumosa East','Atakumosa West','Boluwaduro','Boripe','Ede North','Ede South','Egbedore','Ejigbo','Ife Central','Ife East','Ife North','Ife South','Ifedayo','Ifelodun','Ila','Ilesha East','Ilesha West','Irepodun','Irewole','Isokan','Iwo','Obokun','Odo-Otin','Ola-Oluwa','Olorunda','Oriade','Orolu','Osogbo'];
        }else if($state=='Oyo'){
            var location1 = ['Afijio','Akinyele','Atiba','Atigbo','Egbeda','IbadanCentral','Ibadan North','Ibadan North West','Ibadan South East','Ibadan South West','Ibarapa Central','Ibarapa East','Ibarapa North','Ido','Irepo','Iseyin','Itesiwaju','Iwajowa','Kajola','Lagelu Ogbomosho North','Ogbmosho South','Ogo Oluwa','Oluyole','Ona-Ara','Orelope','Ori Ire','Oyo East','Oyo West','Saki East','Saki West','Surulere'];
        }else if($state=='Plateau'){
            var location1 = ['Barikin Ladi','Bassa','Bokkos','Jos East','Jos North','Jos South','Kanam','Kanke','Langtang North','Langtang South','Mangu','Mikang','Pankshin','Quaan Pan','Riyom','Shendam','Wase'];
        }else if($state=='Rivers'){
            var location1 = ['Abua/Odual','Ahoada East','Ahoada West','Akuku Toru','Andoni','Asari-Toru','Bonny','Degema','Emohua','Eleme','Etche','Gokana','Ikwerre','Khana','Obia/Akpor','Ogba/Egbema/Ndoni','Ogu/Bolo','Okrika','Omumma','Opobo/Nkoro','Oyigbo','Port-Harcourt','Tai'];
        }else if($state=='Sokoto'){
            var location1 = ['Binji','Bodinga','Dange-shnsi','Gada','Goronyo','Gudu','Gawabawa','Illela','Isa','Kware','kebbe','Rabah','Sabon birni','Shagari','Silame','Sokoto North','Sokoto South','Tambuwal','Tqngaza','Tureta','Wamako','Wurno','Yabo'];
        }else if($state=='Taraba'){
            var location1 = ['Ardo-kola','Bali','Donga','Gashaka','Cassol','Ibi','Jalingo','Karin-Lamido','Kurmi','Lau','Sardauna','Takum','Ussa','Wukari','Yorro','Zing'];
        }else if($state=='Yobe'){
            var location1 = ['Bade','Bursari','Damaturu','Fika','Fune','Geidam','Gujba','Gulani','Jakusko','Karasuwa','Karawa','Machina','Nangere','Nguru Potiskum','Tarmua','Yunusari','Yusufari'];
        }else if($state=='Zamfara'){
            var location1 = ['Anka','Bakura','Birnin Magaji','Bukkuyum','Bungudu','Gummi','Gusau','Kaura','Namoda','Maradun','Maru','Shinkafi','Talata Mafara','Tsafe','Zurmi'];
        }else if($state=='Abuja'){
            var location1 = ['Gwagwalada','Kuje','Abaji','Abuja Municipal','Bwari','Kwali'];
        }else{var location1 = ['others'];}

        var local_goverment_list = '<option value="" selected="selected">--Select State*--</option>';
        var local_goverment_list_2 = '<li data-value="" class="option focus">--Select State*--</li>'

        for(var i = 0; i < location1.length; i++){
            local_goverment_list += '<option selected="selected" value="'+location1[i]+'">'+location1[i]+'</option>';

            local_goverment_list_2 += '<li data-value="'+location1[i]+'" class="option selected">'+location1[i]+'</li>'
        }

        $(a).closest('.state_main').next('.lga_main').find('select').html(local_goverment_list);
        $(".lga_located").closest('.lga_main').find('.list').html(local_goverment_list_2)

    }

    //f/functioonn controls the preview of assessment
    function previewAssessment(a){

        if($("#assessment_body").val() == ""){
            showSuccessToast("Description is required!", "warning");
            return false;
        }


        $(".notification_modal_title").text("Property Description Preview");

        var description_val = $(".ed_property_description").val();

        //ask the question to seeek the knowledge of the user before completing the action
        $(".modal-body").html("<div class='row'><div class='col-md-12'>"+description_val+"</div></div>");

        //create a large modal
        $(".modal-dialog").addClass('modal-lg');

        //assign a new text to the modal button
        $(".notification_modal_button").removeAttr('onclick').addClass('hidden');

        //call the notification modal
        $("#notification_modal").modal({backdrop:'static', keyboard: false});

    }

    function addAmenitiesField() {

        if($(".nazac_property_amenities").length > 9){
            returnFunctions.showSuccessToaster("You can only create nine fields at a time.","warning");
            return;
        }

        let new_field = '<div class="col-sm-3"><label>Property Amenities 4<span class="text-danger"> <small class="text-danger"></small></span></label> <input class="form-control my_form nazac_property_amenities" type="test" name="nazac_property_amenities[]" value=""></div>';

        $(new_field).insertBefore(".marker");

        //loop through the fields and re-add the headers
        var selected_head = $(".nazac_property_amenities");
        for(var i = 0; i < selected_head.length; i++){
            var no = parseFloat(i) + parseFloat(1)
            $(selected_head[i]).prev('label').html('Property Amenities '+no+'<span class="text-danger"> <small class="text-danger"></small></span>');

        }

    }
    
    function removeAmenitiesField() {

        if($(".nazac_property_amenities").length == 4){
            /*returnFunctions.showSuccessToaster("You can only create nine fields at a time.","warning");*/
            return;
        }

        var selected_head = $(".nazac_property_amenities");
        $(selected_head[parseFloat($(".nazac_property_amenities").length-1)]).closest('.col-sm-3').remove();

    }

    function addPropertyFeatureField(){

        if($(".nazac_property_features").length > 9){
            returnFunctions.showSuccessToaster("You can only create nine fields at a time.","warning");
            return;
        }

        let new_field = '<div class="col-sm-3"><label>Property Amenities 4<span class="text-danger"> <small class="text-danger"></small></span></label> <input class="form-control my_form nazac_property_features" type="test" name="nazac_property_features[]" value=""></div>';

        $(new_field).insertBefore(".marker_good");

        //loop through the fields and re-add the headers
        var selected_head = $(".nazac_property_features");
        for(var i = 0; i < selected_head.length; i++){
            var no = parseFloat(i) + parseFloat(1)
            $(selected_head[i]).prev('label').html('Feature '+no+'<span class="text-danger"> <small class="text-danger"></small></span>');

        }

    }

    function removePropertyFeatureField(){

        if($(".nazac_property_features").length == 4){
            /*returnFunctions.showSuccessToaster("You can only create nine fields at a time.","warning");*/
            return;
        }

        var selected_head = $(".nazac_property_features");
        $(selected_head[parseFloat($(".nazac_property_features").length-1)]).closest('.col-sm-3').remove();

    }


    function addBadDefectsField(){

        if($(".bad_defects").length > 9){
            returnFunctions.showSuccessToaster("You can only create nine fields at a time.","warning");
            return;
        }

        let new_field = '<div class="col-sm-3"><label>Property Amenities 4<span class="text-danger"> <small class="text-danger"></small></span></label> <input class="form-control my_form bad_defects" type="test" name="bad_defects[]" value=""></div>';

        $(new_field).insertBefore(".marker_bad");

        //loop through the fields and re-add the headers
        var selected_head = $(".bad_defects");
        for(var i = 0; i < selected_head.length; i++){
            var no = parseFloat(i) + parseFloat(1);
            $(selected_head[i]).prev('label').html('Defect '+no+'<span class="text-danger"> <small class="text-danger"></small></span>');

        }

    }

    function removeBadDefectsField(){

        if($(".bad_defects").length == 4){
            /*returnFunctions.showSuccessToaster("You can only create nine fields at a time.","warning");*/
            return;
        }

        var selected_head = $(".bad_defects");
        $(selected_head[parseFloat($(".bad_defects").length-1)]).closest('.col-sm-3').remove();

    }//

    function activateThumbnailUpload() {

        $("#theFiles").click();
        //$("#main_image").click();

    }

    // function activateThumbnailUpload() {
    //     $("#theFiless").click();
    // }

    function activateMultiUpload() {
        $("#multiple_image").click();
    }

    function activateMultiUploadForListedProperty() {
        $("#multiple_image_for_listed_property").click();
    }

    function uploadThumbnailUpload(){

        //main_image
        var form_data = new FormData();
        var files = $('#main_image')[0].files;
        var postid = $("#user_id_holder").val();

        if(files.length > 12){
            error_images += 'You can not select more than 12 image files (Max: 12)!. ';
            returnFunctions.showSuccessToaster('You can not select more than 12 image files (Max: 12)! ', 'warning');
            return;
        }

        //document.getElementById('multiple_image').files[i]
        //get the the image
        form_data.append("thumbnail", document.getElementById('main_image').files[0]);
        form_data.append('property_unique_id', postid);
        $.ajax({
            url: baseurl+'agents/mains/upload_main_image',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            beforeSend:function(){
                //returnFunctions.showSuccessToaster('Loading.....', 'warning');
                $('#nazac_loader').css({'display':'block'})
            },
            success: function(php_script_response){

                var theReturned = JSON.parse(php_script_response);

                $('#nazac_loader').css({'display':'none'});

                if(theReturned.error_code == 0){

                    $(".main_image_img").attr({'src':baseurl+theReturned.success.image_name});

                    returnFunctions.showSuccessToaster(theReturned.success.message, 'success');


                }else if(theReturned.error_code == 1){

                    returnFunctions.showSuccessToaster(theReturned.error, 'warning');

                }

            }
        });

    }

    function uploadListedPropertyThumbnailUpload(){

        //main_image
        var form_data = new FormData();
        var files = $('#main_image')[0].files;
        var postid = $("#user_id_holder").val();

        if(files.length > 12){
            error_images += 'You can not select more than 12 image files (Max: 12)!. ';
            returnFunctions.showSuccessToaster('You can not select more than 12 image files (Max: 12)! ', 'warning');
            return;
        }

        //document.getElementById('multiple_image').files[i]
        //get the the image
        form_data.append("thumbnail", document.getElementById('main_image').files[0]);
        form_data.append('property_unique_id', postid);
        $.ajax({
            url: baseurl+'agents/mains/upload_listed_property_main_image',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            beforeSend:function(){
                //returnFunctions.showSuccessToaster('Loading.....', 'warning');
                $('#nazac_loader').css({'display':'block'})
            },
            success: function(php_script_response){

                var theReturned = JSON.parse(php_script_response);

                $('#nazac_loader').css({'display':'none'});

                if(theReturned.error_code == 0){

                    $(".main_image_img").attr({'src':baseurl+theReturned.success.image_name});

                    returnFunctions.showSuccessToaster(theReturned.success.message, 'success');


                }else if(theReturned.error_code == 1){

                    returnFunctions.showSuccessToaster(theReturned.error, 'warning');

                }

            }
        });

    }

    $("#multiple_image_for_listed_property").on('change',(function(e) {

        var obj, dbParam, xmlhttp, myObj;
        var postid = document.getElementById('user_id_holder').value;
        var error_images = '';
        var form_data = new FormData();
        var files = $('#multiple_image_for_listed_property')[0].files;
        if(files.length > 12){
            error_images += 'You can not select more than 12 image files (Max: 12)!. ';
            returnFunctions.showSuccessToaster('You can not select more than 12 image files (Max: 12)! ', 'warning');
            return;
        }
        for(var i=0; i<files.length; i++){

            var name = document.getElementById("multiple_image_for_listed_property").files[i].name;
            var ext = name.split('.').pop().toLowerCase();

            if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
                error_images += 'Invalid '+i+'  file type use eg: png, jpg, jpeg, gif. ';
                returnFunctions.showSuccessToaster('Invalid '+i+'  file type use eg: png, jpg, jpeg, gif', 'warning')
            }

            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("multiple_image_for_listed_property").files[i]);
            var f = document.getElementById("multiple_image_for_listed_property").files[i];
            var fsize = f.size||f.fileSize;
            if(fsize > 2000000){
                error_images +=  i + ' File Size is too big (Max 2MB). ';
                returnFunctions.showSuccessToaster('File Size is too big (Max 2MB)', 'warning')
            }else{
                form_data.append("multFile[]", document.getElementById('multiple_image_for_listed_property').files[i]);
            }//check file size

        }//for loop

        if(error_images !== ''){
            returnFunctions.showSuccessToaster('Image upload failed, Captured Errors: '+error_images, 'warning');
            return;
        }


        form_data.append('postid', postid);
        $.ajax({
            url: baseurl+'agents/mains/multiple_image_upload_for_listed_property',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            beforeSend:function(){
                //returnFunctions.showSuccessToaster('Loading.....', 'warning');
                $('#nazac_loader').css({'display':'block'})
            },
            success: function(php_script_response){
                var theReturned = JSON.parse(php_script_response);

                $('#nazac_loader').css({'display':'none'})

                if(theReturned.error_code == 0){

                    returnFunctions.showSuccessToaster(theReturned.success.message, 'success');
                    createImageDisplay(theReturned.success.data);

                }else if(theReturned.error_code == 1){

                    returnFunctions.showSuccessToaster(theReturned.error, 'warning');

                }

            }
        });
    }));

    ////Upload Multiple Images
    $('#multiple_image').on('change',(function(e) {

        var obj, dbParam, xmlhttp, myObj;
        var postid = document.getElementById('user_id_holder').value;
        var error_images = '';
        var form_data = new FormData();
        var files = $('#multiple_image')[0].files;
        if(files.length > 12){
            error_images += 'You can not select more than 12 image files (Max: 12)!. ';
            returnFunctions.showSuccessToaster('You can not select more than 12 image files (Max: 12)! ', 'warning');
            return;
        }
        for(var i=0; i<files.length; i++){

            var name = document.getElementById("multiple_image").files[i].name;
            var ext = name.split('.').pop().toLowerCase();

            if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
                error_images += 'Invalid '+i+'  file type use eg: png, jpg, jpeg, gif. ';
                returnFunctions.showSuccessToaster('Invalid '+i+'  file type use eg: png, jpg, jpeg, gif', 'warning')
            }

            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("multiple_image").files[i]);
            var f = document.getElementById("multiple_image").files[i];
            var fsize = f.size||f.fileSize;
            if(fsize > 2000000){
                error_images +=  i + ' File Size is too big (Max 2MB). ';
                returnFunctions.showSuccessToaster('File Size is too big (Max 2MB)', 'warning')
            }else{
                form_data.append("multFile[]", document.getElementById('multiple_image').files[i]);
            }//check file size

        }//for loop

        if(error_images !== ''){
            returnFunctions.showSuccessToaster('Image upload failed, Captured Errors: '+error_images, 'warning');
            return;
        }


        form_data.append('postid', postid);
        $.ajax({
            url: baseurl+'agents/mains/multiple_image_upload',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            beforeSend:function(){
                //returnFunctions.showSuccessToaster('Loading.....', 'warning');
                $('#nazac_loader').css({'display':'block'})
            },
            success: function(php_script_response){
                var theReturned = JSON.parse(php_script_response);

                $('#nazac_loader').css({'display':'none'})

                if(theReturned.error_code == 0){

                    returnFunctions.showSuccessToaster(theReturned.success.message, 'success');
                    createImageDisplay(theReturned.success.data);

                }else if(theReturned.error_code == 1){

                    returnFunctions.showSuccessToaster(theReturned.error, 'warning');

                }

            }
        });
    }));


    //function that create image display for the properties
    function createImageDisplay(image_datas){

        if(image_datas === ''){

            let theMainRow = '<div class="col-sm-12 main_img_holder" ><div class="text-center" style="margin-top: 80px; " ><h4>No Image Has Been Uploaded</h4><p>Click Upload Button Below to Add Images</p></div></div>';

            //append the warning message to the image box
            $('.image-box').html(theMainRow);
        }

        if(image_datas !== ''){

            //split the returned image name
            let image_array = image_datas.split(',');

            //create a counter
            let theCounter = 1;

            //initialize the variable that will hold the element values
            let theElement = '';

            //get the lenght of the array
            let $lenght = image_array.length;

            //loop through the new created array and form create elements to hold the images
            for(let i = 0; i < image_array.length; i++){

                //create the row div
                /*if(theCounter%4 == 1 ){
                    //create the row that holds every thing
                    if(theCounter > 1){
                        theElement += "<div class='row' style='margin-top: 20px'>";
                    }
                    if(theCounter == 1){
                        theElement +=  "<div class='row'>";
                    }
                }*/


                //crete the elements that will hold each image
                theElement += '<div class="col-sm-2 main_img_holder"><figure class="image_figure_2"><img src="'+baseurl+'/resource/upload/registered_property/'+image_array[i]+'" alt="Trulli" style="width:100%"><div class="checkbox_holder" href="javascript:;"><input type="checkbox" class="property_details_image_check_box" value="'+image_array[i]+'" /></div></figure></div>';

                //close the row div
                /*if(theCounter%4 == 0){
                    //create the row that holds every thing
                    theElement += "</div>";
                }

                //when you have less than four items
                if(i == $lenght-1 && theCounter%4 != 0){

                    theElement += "</div>";

                }*/

                //increament the counter
                theCounter++;
            }

            //shoot the create element into the image box
            //append the warning message to the image box
            $('.image-box').html(theElement);

        }

    }

    //this function deletes the seleted images
    function deleteSelectedPropertyImage(table_name){

        //select the whole images for the property in the brown bordered box.
        let theSeletedImage = $('.property_details_image_check_box');

        //initialize an array that will collect the images to be deleted
        let image_array = new Array();

        //loop through the selected images and collect the images in an array
        for(let i = 0; i < theSeletedImage.length; i++){

            if($(theSeletedImage[i]).prop('checked') === true){
                image_array.push($(theSeletedImage[i]).val())
            }

        }

        //check array lenght
        if(image_array.length == 0){
            returnFunctions.showSuccessToaster('Please select atleast one image to proceed', 'warning');
            return;
        }

        //change modal title
        $(".notification_modal_title").text("Delete Property Image(s)");

        //ask the question to seeek the knowledge of the user before completing the action
        $(".modal-body").addClass('text-center').html("<div class='row'><div class='col-md-12 text-center'>Do you really want to Delete the selected image(s)?<br>Click the Delete Image(s) button to continue</div></div>");

        //assign a new text to the modal button
        $(".notification_modal_button").removeAttr('onclick').text('Delete Image(s)').attr({"onclick":"finaliseDeleteOfSelectedPropertyImage(this)", 'table_name':table_name});

        //call the notificcation modal
        $("#notification_modal").modal({backdrop: 'static', keyboard: false});

    }

    function finaliseDeleteOfSelectedPropertyImage(a){

        //hide the notification modal
        $("#notification_modal").modal('hide');

        //select the whole images for the property in the brown bordered box.
        let theSeletedImage = $('.property_details_image_check_box');

        let thePostId = $('#user_id_holder').val().trim();

        //initialize an array that will collect the images to be deleted
        let image_array = new Array();

        //loop through the selected images and collect the images in an array
        for(let i = 0; i < theSeletedImage.length; i++){

            if($(theSeletedImage[i]).prop('checked') === true){
                image_array.push($(theSeletedImage[i]).val())
            }

        }

        //check if the user seleted an image
        if(image_array.length == 0){
            returnFunctions.showSuccessToaster('You must select atleast one image before you ca delete!', 'warning');
            return;
        }

        //create an obj for the values
        let obj = {theSeletedImage:image_array, post_id:thePostId, table_name:$(a).attr('table_name')};

        //insert an animation
        $('#nazac_loader').css({'display':'block'})

        $.post(baseurl+'agents/mains/delete_selected_property_image', obj, (response, status)=>{

            //catch the response
            let theResponse = JSON.parse(response);
            $('#nazac_loader').css({'display':'none'})

            if(theResponse.error_code == 0){

                returnFunctions.showSuccessToaster(theResponse.success.message, 'success');
                createImageDisplay(theResponse.success.data);

            }else if(theResponse.error_code == 1){

                returnFunctions.showSuccessToaster(theResponse.error, 'warning');

            }

        })

    }

    //this function deletes the seleted images
    function deleteSelectedPropertyImageForRoomySelection(table_name){

        //select the whole images for the property in the brown bordered box.
        let theSeletedImage = $('.property_details_image_check_box');

        //initialize an array that will collect the images to be deleted
        let image_array = new Array();

        //loop through the selected images and collect the images in an array
        for(let i = 0; i < theSeletedImage.length; i++){

            if($(theSeletedImage[i]).prop('checked') === true){
                image_array.push($(theSeletedImage[i]).val())
            }

        }

        //check array lenght
        if(image_array.length == 0){
            returnFunctions.showSuccessToaster('Please select atleast one image to proceed', 'warning');
            return;
        }

        //change modal title
        $(".notification_modal_title").text("Delete Property Image(s)");

        //ask the question to seeek the knowledge of the user before completing the action
        $(".modal-body").addClass('text-center').html("<div class='row'><div class='col-md-12 text-center'>Do you really want to Delete the selected image(s)?<br>Click the Delete Image(s) button to continue</div></div>");

        //assign a new text to the modal button
        $(".notification_modal_button").removeAttr('onclick').text('Delete Image(s)').attr({"onclick":"finaliseDeleteOfSelectedPropertyImageForRoomySelect(this)", 'table_name':table_name});

        //call the notificcation modal
        $("#notification_modal").modal({backdrop: 'static', keyboard: false});

    }

    function finaliseDeleteOfSelectedPropertyImageForRoomySelect(a){

        //hide the notification modal
        $("#notification_modal").modal('hide');

        //select the whole images for the property in the brown bordered box.
        let theSeletedImage = $('.property_details_image_check_box');

        let thePostId = $('#user_id_holder').val().trim();

        //initialize an array that will collect the images to be deleted
        let image_array = new Array();

        //loop through the selected images and collect the images in an array
        for(let i = 0; i < theSeletedImage.length; i++){

            if($(theSeletedImage[i]).prop('checked') === true){
                image_array.push($(theSeletedImage[i]).val())
            }

        }

        //check if the user seleted an image
        if(image_array.length == 0){
            returnFunctions.showSuccessToaster('You must select atleast one image before you ca delete!', 'warning');
            return;
        }

        //create an obj for the values
        let obj = {theSeletedImage:image_array, post_id:thePostId, table_name:$(a).attr('table_name')};

        //insert an animation
        $('#nazac_loader').css({'display':'block'})

        $.post(baseurl+'agents/mains/delete_selected_property_image', obj, (response, status)=>{

            //catch the response
            let theResponse = JSON.parse(response);
            $('#nazac_loader').css({'display':'none'})

            if(theResponse.error_code == 0){

                returnFunctions.showSuccessToaster(theResponse.success.message, 'success');
                createImageDisplay(theResponse.success.data);

            }else if(theResponse.error_code == 1){

                returnFunctions.showSuccessToaster(theResponse.error, 'warning');

            }

        })

    }
    
    function saveProperty(table_name) {

        //get the name of the main image
        var main_image = $(".main_image_img").attr('src');
        main_image = main_image.split('/');
        main_image = main_image[parseFloat(main_image.length - 1)];
        let thePostId = $('#user_id_holder').val().trim();

        //check the array lenght
        if(main_image == ""){
            returnFunctions.showSuccessToaster('Please upload a thumbnail', 'warning');
            return;
        }

        //display loader
        $('#nazac_loader').css({'display':'block'})

        //send to the back end
        $.post(baseurl+'agents/mains/check_image_avalaibility', {main_image:main_image, property_unique_id:thePostId, table_name:table_name}, function(data, status) {

            //hide loader
            $('#nazac_loader').css({'display':'none'})

            var theReturned = JSON.parse(data);

            if(theReturned.error_code == 0){

                returnFunctions.showSuccessToaster(theReturned.success.message, 'success');

                if(table_name === 'nazac_property_listing'){

                    $(".property_save_button").removeClass('btn-block');
                    $('<button onclick="publishProperty(this)" property_id="'+thePostId+'" type="button" style="background: #121B22; border-color:#121B22; margin-left:10px; margin-right:10px;" class="btn btn-info btn-lg">Publish Property</button> <a href="'+baseurl+'member/dashboard" style="background: #121B22; border-color:#121B22;" class="btn btn-info btn-lg">Publish Later</a>').insertAfter('.property_save_button');
                }

                if(table_name === 'nazac_register_property'){
                    setTimeout(function () {
                        window.location.href = baseurl+'member/dashboard'
                    }, 4000)
                }


            }else if(theReturned.error_code == 1){
                returnFunctions.showSuccessToaster(theReturned.error, 'warning');
            }

        })


    }

    //property publishing
    function publishProperty(a) {

        var property_unique_id = $(a).attr('property_id');

        //change modal title
        $(".notification_modal_title").text("Publish Property(s)");

        //ask the question to seeek the knowledge of the user before completing the action
        $(".modal-body").addClass('text-center').html("<div class='row'><div class='col-md-12 text-center'>Publishing Property means it will be visible to users who are searching for a properties/Apartment for rent?<br>Click the 'Publish' button to continue</div></div>");

        //assign a new text to the modal button
        $(".notification_modal_button").removeAttr('onclick').text('Publish').attr({"onclick":"finalisePropertyPublishing(this)", 'property_id':property_unique_id});

        //call the notificcation modal
        $("#notification_modal").modal({backdrop: 'static', keyboard: false});

    }

    //finalise publishing
    function finalisePropertyPublishing(a){

        let property_uniue_id = $(a).attr('property_id');

        $('#nazac_loader').css({'display':'block'})

        $.post(baseurl+'agents/mains/publish_property', {property_uniue_id:property_uniue_id}, function(data, status) {

            $('#nazac_loader').css({'display':'none'})

            var theReturned = JSON.parse(data);

            if(theReturned.error_code == 0){

                returnFunctions.showSuccessToaster(theReturned.success.message, 'success');
                setTimeout(function () {
                    window.location.href = baseurl+'member/dashboard'
                }, 6000)


            }else if(theReturned.error_code == 1){
                returnFunctions.showSuccessToaster(theReturned.error, 'warning');
            }

        })

    }

    function callPropertyDetailFunction(){

        var page_no = $(".page_no_holder").val().trim();
        
        if(page_no > 1){
            $(".page_no_holder").val(parseFloat(page_no) + parseFloat(1))
        }

        var slected_element = $("#nazac_property_location");
        getPrpertyDetailsForLocation(slected_element, page_no)

    }

    function getPrpertyDetailsForLocation(a, page_no) {

        //update page number box
        if(page_no == 1){
            $(".page_no_holder").val(parseFloat(page_no) + parseFloat(1))
            //get the selected location
            selected_location = $(a).val();
        }else{
            var selected_location = a.val();
        }

        if(selected_location == ""){
            returnFunctions.showSuccessToaster('Please Select a property location', 'warning');
            return;
        }

        $.post(baseurl+'agents/mains/get_property_details_for_location', {selected_location:selected_location, page_no:page_no}, function (data, status) {

            var theReturned = JSON.parse(data);

            if(theReturned.error_code == 0){

                var txt = '';

                if(page_no == 1 && $('.theSeacrch').length == 0){

                    $('.location_box').removeClass('col-sm-6 col-sm-offset-3').addClass('col-sm-3');

                    $('<div class="col-sm-9 theSeacrch"><form><input type="text" class="form-control search_box_main my_form" onkeyup="carryOutSearch(this)" name="search" placeholder="Search Property... Use Lodge Name, Address, Closest Landmark, landlord/Cartaker Name or Phone Number"></form></div>').insertAfter('.location_box');

                }

                for(var i in theReturned.success.data){

                    var property_num = getPropertyNumber(theReturned.success.data[i].nazac_property_number);
// theReturned.success.data[i].nazac_property_location
                    txt += `<div title="Click to select this property" class="col-sm-6 make_thumb" style="margin-top:20px;" data-property-id="${theReturned.success.data[i].nazac_property_id}" data-selected-location-id="${selected_location}"  onclick="addPropertyForBuilding(this)"><div class="wall-body"> <div class="row"><div class="col-sm-6"><img src="${baseurl+'resource/upload/registered_property/'+theReturned.success.data[i].nazac_property_thumbnail}" style="width:100%; height:100%;" /></div><div class="col-sm-6"><div class="row"> <div class="col-sm-12"><h5 style="margin-top: 15px; margin-bottom: 2px; color:black;">${theReturned.success.data[i].nazac_property_lodge_name}</h5> </div> <div class="col-sm-12"> <p style="margin-top: 3px; margin-bottom: 3px;"><strong class="fa fa-home text-font-14 text-success"></strong> <small> ${theReturned.success.location_name+'/'+property_num}</small></p> </div> <div class="col-sm-12"><p style="margin-top: 3px; margin-bottom: 3px;"><strong class="fa fa-map-marker text-font-14 text-success"></strong><small>${theReturned.success.data[i].nazac_property_lodge_address+','+theReturned.success.location_name}</small></p> </div> <div class="col-sm-12"> <p style="margin-bottom: 3px; margin-top: 3px;"><strong class="fa fa-user text-font-14 text-success"></strong> <small>${theReturned.success.data[i].nazac_property_caretaker_name}</small></p> <p style="margin-bottom: 3px; margin-top: 3px;"><strong class="fa fa-phone text-font-14 text-success"></strong><small>${theReturned.success.data[i].nazac_property_caretaker_phone}</small></p> </div> </div> </div> </div> </div> </div>`;

                }

                if(page_no == 1){

                    txt += '<div class="col-sm-6 col-sm-offset-3 on_top_me" style="margin-top:30px;"> <button style="background: #121B22; border-color:#121B22; color:white;" onclick="callPropertyDetailFunction()" type="button" class="btn btn-block btn-lg">More</button> </div>';

                    $(".property_details_area").html(txt);

                }else{

                    $(txt).insertBefore('.on_top_me');

                }

            }else if(theReturned.error_code == 1){

                returnFunctions.showSuccessToaster(theReturned.error, 'warning');

                if(theReturned.error === 'No Data was returned'){
                    $(".page_no_holder").val(page_no)
                }

            }

        });

    }
    
    function getPropertyNumber(number) {
        var num = '';
        if(number.toString().length == 1){
            num = '00'+number.toString();
        }else if(number.toString().length == 2){
            num = '0'+number.toString();
        }else if(number.toString().length == 3){
            num = number.toString();
        }else{
            num = number.toString();
        }
        return num;
    }

    //build the function that will call the prperty page
    function addPropertyForBuilding(a){

        //get the prperty id and the location id
        var property_id = $(a).attr('data-property-id')
        var selected_location_id = $(a).attr('data-selected-location-id');

        //call modal thet will display a notification to the user on wether to continue with process
        //change modal title
        $(".notification_modal_title").text("Add Property For Rent");

        //ask the question to seeek the knowledge of the user before completing the action
        $(".modal-body").addClass('text-center').html("<div class='row'><div class='col-md-12 text-center'>Do you really want to continue with selected location and Property?<br>Click the 'Continue' button to continue</div></div>");

        //assign a new text to the modal button
        $(".notification_modal_button").removeAttr('onclick').text('Continue').attr({"onclick":"goToAddPropertyPage(this)"}).attr({'property_id':property_id, 'selected_location_id': selected_location_id});

        //call the notificcation modal
        $("#notification_modal").modal({backdrop: 'static', keyboard: false});

    }

    //got to the property page
    function  goToAddPropertyPage(a) {
//nazac_property_location
        //get property detils
        let  property_id = $(a).attr('property_id');
        let selected_location_id = $(a).attr('selected_location_id');


        if(property_id == '' || selected_location_id == ''){
            returnFunctions.showSuccessToaster('Please refresh this page and start over again', 'warning');
            return;
        }

        //redirect to the url for property addution
        window.location.href = baseurl+'agents/mains/load_property_addition/'+property_id+'/'+selected_location_id;

    }

    function carryOutSearch(a) {

        let search_keyword = $(a).val().trim();
        let property_location = $("#nazac_property_location").val().trim();
        let selected_location = property_location;

        if(property_location == ""){
            location.reload();
            return;
        }

        if(search_keyword == ""){
            returnFunctions.showSuccessToaster('Please enter a search term', 'warning');
            $(".search_result").html("");
            return;
        }

        if(search_keyword.length < 3){
            return;
        }

        $.post(baseurl+'agents/mains/search_for_property_details/', {search_keyword:search_keyword, property_location:property_location}, function (data, status) {

            var theReturned = JSON.parse(data);

            if(theReturned.error_code == 0){

                var txt = '';

                for(var i in theReturned.success.data){

                    var property_num = getPropertyNumber(theReturned.success.data[i].nazac_property_number);

                    txt += `<div title="Click to select this property" class="col-sm-6 make_thumb" style="margin-top:20px;" data-property-id="'+theReturned.success.data[i].nazac_property_id+'" data-selected-location-id="${selected_location}"  onclick="addPropertyForBuilding(this)"><div class="wall-body"> <div class="row"><div class="col-sm-6"><img src="${baseurl+'resource/upload/registered_property/'+theReturned.success.data[i].nazac_property_thumbnail}" style="width:100%" /></div><div class="col-sm-6"><div class="row"> <div class="col-sm-12"><h5 style="margin-top: 15px; margin-bottom: 2px; color:black;">${theReturned.success.data[i].nazac_property_lodge_name}</h5> </div> <div class="col-sm-12"> <p style="margin-top: 3px; margin-bottom: 3px;"><strong class="fa fa-home text-font-14 text-success"></strong> <small> ${theReturned.success.location_name+'/property_num+'}</small></p> </div> <div class="col-sm-12"><p style="margin-top: 3px; margin-bottom: 3px;"><strong class="fa fa-map-marker text-font-14 text-success"></strong><small>${theReturned.success.data[i].nazac_property_lodge_address+','+theReturned.success.location_name}</small></p> </div> <div class="col-sm-12"> <p style="margin-bottom: 3px; margin-top: 3px;"><strong class="fa fa-user text-font-14 text-success"></strong> <small>${theReturned.success.data[i].nazac_property_caretaker_name}</small></p> <p style="margin-bottom: 3px; margin-top: 3px;"><strong class="fa fa-phone text-font-14 text-success"></strong><small>${theReturned.success.data[i].nazac_property_caretaker_phone}</small></p> </div> </div> </div> </div> </div> </div>`;

                }

                /*'<div class="col-sm-6 make_thumb" data-property-id="'+theReturned.success.data[i].nazac_property_id+'" data-selected-location-id="'+selected_location+'"  onclick="addPropertyForBuilding(this)"><div class="wall-body"> <div class="row"><div class="col-sm-6"><img src="'+baseurl+'resource/upload/registered_property/'+theReturned.success.data[i].nazac_property_thumbnail+'" style="width:100%" /></div><div class="col-sm-6"><div class="row"> <div class="col-sm-12"><h5 style="margin-top: 15px; margin-bottom: 2px; color:black;"> '+theReturned.success.data[i].nazac_property_lodge_name+'</h5> </div> <div class="col-sm-12"> <p style="margin-top: 3px; margin-bottom: 3px;"><strong class="fa fa-home text-font-14 text-success"></strong> <small> '+theReturned.success.location_name+'/'+property_num+'</small></p> </div> <div class="col-sm-12"><p style="margin-top: 3px; margin-bottom: 3px;"><strong class="fa fa-map-marker text-font-14 text-success"></strong><small> '+theReturned.success.data[i].nazac_property_lodge_address+','+theReturned.success.location_name+'</small></p> </div> <div class="col-sm-12"> <p style="margin-bottom: 3px; margin-top: 3px;"><strong class="fa fa-user text-font-14 text-success"></strong> <small>  '+theReturned.success.data[i].nazac_property_caretaker_name+'</small></p> <p style="margin-bottom: 3px; margin-top: 3px;"><strong class="fa fa-phone text-font-14 text-success"></strong><small> '+theReturned.success.data[i].nazac_property_caretaker_phone+'</small></p> </div> </div> </div> </div> </div> </div> ';*/

                $(".search_result").html(txt);

            }else if(theReturned.error_code == 1){

                returnFunctions.showSuccessToaster(theReturned.error, 'warning');

            }

        })

    }

    //Error handlers

    //call the function below when pages in array is opened
    <?php
        $page_name = array("load_property_addition", "process_property_form", "update_property_registration", "process_find_roomy_form", "find_roomate");
        if(in_array($this->uri->segment(3), $page_name)){ ?>

            $(document).ready(function () {
                display_error();
            })

    <?php }
    ?>

    function display_error() {

        var error_display = $(".error_display");
        for(var i = 0; i < error_display.length; i++){

            if($(error_display[i]).text().trim() !== ""){
                $(error_display[i]).addClass('show_error');
            }
        }

    }
    
    function removeErrorDisplayer(a) {

        if($(a).val().trim() != ""){
            $(a).siblings('.error_display').removeClass('show_error')
        }

    }

    //error handlers stops

    //validator code
    function validator(value_array, fields_array, class_names){

        var error_checker = 0;
        for(let l = 0; l < value_array.length; l++){

            //check for empty values
            if($(value_array[l]).val() === ""){
                //console.log(value_array[l])
                $(value_array[l]).css({'border':'1px solid red'});
                error_checker = 1;
            }

        }

        return error_checker;


    }

    $(document).ready(function () {
        $('.carousel').carousel()
        //$("carousel-item").css({'display':'block'})
    });
    
    function startFindRoomy() {

        $(".notification_modal_title").text("Find A Room Mate");

        //ask the question to seeek the knowledge of the user before completing the action
        $(".modal-body").html("<div class='row'><div class='col-md-12 text-center' ><p class='alert'>Click on any the options below to proceed to the next step </p></div><div class='col-sm-8 col-sm-offset-2 text-center' style='margin-top:20px'><p class='alert alert-info'><a href='"+baseurl+"roomy/mains/display_roommate_details/existing_apartment'>I`m searching for a roomate, one who have already rented an apartment/Property</a></p></div><div class='col-sm-8 col-sm-offset-2 text-center' style='margin-top:20px'><p class='alert alert-info'><a href='"+baseurl+"roomy/mains/display_roommate_details/no_apartment'>I have rented an apartment/property, I need a roomate to join me in this apartment</a></p></div><div class='col-sm-8 col-sm-offset-2'><p class='alert alert-danger'><i class='fa fa-warning'></i> Please ensure you involve the agent incharge of the location of the building before caring out any transaction with your to be rommy to avoid been scammed be warned</p></div></div>");

        //'"+baseurl+"roomy/mains/find_roomate/existing_apartment'
        //'"+baseurl+"roomy/mains/find_roomate/no_apartment'

        //create a large modal
        //$(".modal-dialog").addClass('modal-lg');

        //assign a new text to the modal button
        $(".notification_modal_button").removeAttr('onclick').addClass('hidden');

        //call the notification modal
        $("#notification_modal").modal({backdrop:'static', keyboard: false});

    }

    function startFindRoomy_2() {

        $(".notification_modal_title").text("Find A Room Mate");

        //ask the question to seeek the knowledge of the user before completing the action
        $(".modal-body").html("<div class='row'><div class='col-md-12 text-center' ><p class='alert'>Click on any the options below to proceed to the next step </p></div><div class='col-sm-8 col-sm-offset-2 text-center' style='margin-top:20px'><p class='alert alert-info'><a href='"+baseurl+"roomy/mains/display_roommate_details/existing_apartment/guest'>I`m searching for a roomate, one who have already rented an apartment/Property</a></p></div><div class='col-sm-8 col-sm-offset-2 text-center' style='margin-top:20px'><p class='alert alert-info'><a href='"+baseurl+"roomy/mains/display_roommate_details/no_apartment/guest'>I have rented an apartment/property, I need a roomate to join me in this apartment</a></p></div><div class='col-sm-8 col-sm-offset-2'><p class='alert alert-danger'><i class='fa fa-warning'></i> Please ensure you involve the agent incharge of the location of the building before caring out any transaction with your to be rommy to avoid been scammed be warned</p></div></div>");

        //'"+baseurl+"roomy/mains/find_roomate/existing_apartment'
        //'"+baseurl+"roomy/mains/find_roomate/no_apartment'

        //create a large modal
        //$(".modal-dialog").addClass('modal-lg');

        //assign a new text to the modal button
        $(".notification_modal_button").removeAttr('onclick').addClass('hidden');

        //call the notification modal
        $("#notification_modal").modal({backdrop:'static', keyboard: false});

    }

    function chooseWhereApartmentWasRented(a) {

        var answer = $(a).val().trim();
        if(answer === ''){
            returnFunctions.showSuccessToaster('Please Select an answer', 'warning');
            return;
        }

        if(answer === 'no'){

            $(".question").removeClass('col-sm-6').addClass('col-sm-12');
            $(".rin_holder").addClass('hidden')

        }

        if(answer === 'yes'){

            $(".question").removeClass('col-sm-12').addClass('col-sm-6');
            $(".rin_holder").removeClass('hidden')

        }

    }

    <?php
    $page_array = array('process_find_roomy_form', 'find_roomate');
    if(in_array($this->uri->segment(3), $page_array)){ ?>
        $(document).ready(function () {
            getProperty($("#rin_number"));
        })
    <?php } ?>

    function getProperty(a) {

        var rin_number = $(a);

        var error_code = validator([rin_number], [], []);

        if(rin_number.val() == ''){
            /*returnFunctions.showSuccessToaster('Rin Number is required', 'warning');
            $(".property_existence_status").addClass('fa-times-circle text-danger').removeClass('fa-check-circle text-success');*/
            return;
        }
        $('#nazac_loader').css({'display':'block'});
        $.get(baseurl+'roomy/mains/get_property_for_find_room/'+rin_number.val().trim().replace("/", "-"), function (data, status) {

            var theReturned = JSON.parse(data);
            $('#nazac_loader').css({'display':'none'})
            if(theReturned.error_code == 0){

                if(theReturned.success.data.listed_property_details_count == 1){

                    $(".property_existence_status").addClass('fa-check-circle text-success').removeClass('fa-times-circle text-danger');
                    $(".property_existence_status").closest('.mpa').siblings('input').css({'border-color':'green'})
                    return;

                }
                $(".property_existence_status").addClass('fa-times-circle text-danger').removeClass('fa-check-circle text-success');
                $(".property_existence_status").closest('.mpa').siblings('input').css({'border-color':'red'});

            }else if(theReturned.error_code == 1){


                returnFunctions.showSuccessToaster(theReturned.error, 'warning');
                $(".property_existence_status").addClass('fa-times-circle text-danger').removeClass('fa-check-circle text-success');
                $(".property_existence_status").closest('.mpa').siblings('input').css({'border-color':'red'})

            }

        })

    }//department_list faculty_list pair_option

    function disclosePairOption(a){

        var selected_option = $(a);

        var error_code = validator([selected_option], [], []);

        if(error_code == 1){
            returnFunctions.showSuccessToaster('Please select an option for possible pair option');
            return;
        }

        $(".pair_option_1").addClass('hidden');
        $(".pair_option").addClass('col-sm-12').removeClass('col-sm-6');

        if(selected_option.val().trim() === 'department'){
            $(".pair_option").addClass('col-sm-6').removeClass('col-sm-12');
            $(".pair_option_2").removeClass('hidden');
        }
        if(selected_option.val().trim() === 'faculty'){
            $(".pair_option").addClass('col-sm-6').removeClass('col-sm-12');
            $(".pair_option_1").removeClass('hidden');
        }
        /*if(selected_option.val().trim() === 'random'){

        }*/
        //

    }
    
    function indicateInterestToBeARoomMate(room_mate_request_id) {

        if(room_mate_request_id === ""){

            returnFunctions.showSuccessToaster('Please refresh the page and try again', 'waning');
            return;

        }

        //change modal title
        $(".notification_modal_title").text("Add Property For Rent");

        //ask the question to seeek the knowledge of the user before completing the action
        $(".modal-body").addClass('text-center').html("<div class='row'><div class='col-sm-10 col-sm-offset-1 text-center'><label>Please Describe your Personality in not more 300 Words</label><textarea class='form-control description_of_self' maxlength='300'></textarea></div><div class='col-md-12 text-center' style='margin-top:20px;'>Click the 'Continue' button to continue</div></div>");

        //assign a new text to the modal button
        $(".notification_modal_button").removeAttr('onclick').text('Continue').attr({"onclick":"finaliseIndicateInterestToBeARoomMate(this)"}).attr({'room_mate_request_id':room_mate_request_id});

        //call the notificcation modal
        $("#notification_modal").modal({backdrop: 'static', keyboard: false});

    }//


    function finaliseIndicateInterestToBeARoomMate(a) {

        //get the value for the room_mate_request_id
        var room_mate_request_id = $(a).attr('room_mate_request_id');
        var description_of_self = $(".description_of_self").val().trim();

        if(description_of_self === ''){
            returnFunctions.showSuccessToaster('Description of Personality is required!', 'warning');
            return;
        }

        $('#nazac_loader').css({'display':'block'})

        //push to the backend
        $.post(baseurl+'roomy/mains/process_roomy_interest', {room_mate_request_id:room_mate_request_id, description_of_self:description_of_self}, function (data, status) {

            var theReturned = JSON.parse(data);

            $('#nazac_loader').css({'display':'none'})

            if(theReturned.error_code == 0){

                returnFunctions.showSuccessToaster(theReturned.success.message, 'success');
                setTimeout(function () {
                    window.location.href = baseurl+'roomy/mains/single_roomy_request/'+theReturned.success.data
                }, 4000)


            }else if(theReturned.error_code == 1){

                returnFunctions.showSuccessToaster(theReturned.error, 'warning')

            }

        })

    }
    
    function declineRoonMate(particular_interest_indication_id) {

        if(particular_interest_indication_id === ''){
            returnFunctions.showSuccessToaster('Please referesh page and try again', 'warning');
            return;
        }

        //change modal title
        $(".notification_modal_title").text("Decline Request");

        //ask the question to seeek the knowledge of the user before completing the action
        $(".modal-body").addClass('text-center').html("<div class='row'><div class='col-md-12 text-center'>Click the 'Continue' button to continue</div></div>");

        //assign a new text to the modal button
        $(".notification_modal_button").removeAttr('onclick').text('Continue').attr({"onclick":"finaliseDeclineRoomMate(this)"}).attr({'particular_interest_indication_id':particular_interest_indication_id});

        //call the notificcation modal
        $("#notification_modal").modal({backdrop: 'static', keyboard: false});

    }
    
    function acceptRoonMate(roomy_request_id, particular_interest_indication_id) {

        if(roomy_request_id === ''){
            returnFunctions.showSuccessToaster('Please referesh page and try again', 'warning');
            return;
        }

        //change modal title
        $(".notification_modal_title").text("Accept Request");

        //ask the question to seeek the knowledge of the user before completing the action
        $(".modal-body").addClass('text-center').html("<div class='row'><div class='col-md-12 text-center'>Click the 'Continue' button to continue</div></div>");

        //assign a new text to the modal button
        $(".notification_modal_button").removeAttr('onclick').text('Continue').attr({"onclick":"finaliseAcceptRoonMate(this)"}).attr({'roomy_request_id':roomy_request_id, particular_interest_indication_id:particular_interest_indication_id});

        //call the notificcation modal
        $("#notification_modal").modal({backdrop: 'static', keyboard: false});

    }
    
    function finaliseDeclineRoomMate(a) {

        //get the value for the room_mate_request_id
        var particular_interest_indication_id = $(a).attr('particular_interest_indication_id');

        $('#nazac_loader').css({'display':'block'})

        //push to the backend
        $.post(baseurl+'roomy/mains/finalise_decline_room_mate', {particular_interest_indication_id:particular_interest_indication_id}, function (data, status) {

            var theReturned = JSON.parse(data);

            $('#nazac_loader').css({'display':'none'})

            if(theReturned.error_code == 0){

                returnFunctions.showSuccessToaster(theReturned.success.message, 'success');
                setTimeout(function () {
                    location.reload();
                }, 4000)


            }else if(theReturned.error_code == 1){

                returnFunctions.showSuccessToaster(theReturned.error, 'warning')

            }

        })

    }
    
    function finaliseAcceptRoonMate(a) {

        //get the value for the room_mate_request_id
        var roomy_request_id = $(a).attr('roomy_request_id');
        var particular_interest_indication_id = $(a).attr('particular_interest_indication_id');

        $('#nazac_loader').css({'display':'block'})

        //push to the backend
        $.post(baseurl+'roomy/mains/finalise_accept_room_mate', {roomy_request_id:roomy_request_id, particular_interest_indication_id:particular_interest_indication_id}, function (data, status) {

            var theReturned = JSON.parse(data);

            $('#nazac_loader').css({'display':'none'})

            if(theReturned.error_code == 0){

                returnFunctions.showSuccessToaster(theReturned.success.message, 'success');
                setTimeout(function () {
                    location.reload();
                }, 4000)


            }else if(theReturned.error_code == 1){

                returnFunctions.showSuccessToaster(theReturned.error, 'warning')

            }

        })

    }

    $(document).ready(function(){

        $('#nazac_loader').css({'display':'none'});

    })

    //for the  delete of a particular roomy request
    function deleteRoomateRequest(roomy_request_id) {

        //the roomy request id
        if(roomy_request_id === ''){
            location.reload();
            return;
        }

        //change modal title
        $(".notification_modal_title").text("Delete Roomy Request");

        //ask the question to seeek the knowledge of the user before completing the action
        $(".modal-body").addClass('text-center').html("<div class='row'><div class='col-md-12 text-center'>Click the 'Continue' button to continue</div></div>");

        //assign a new text to the modal button
        $(".notification_modal_button").removeAttr('onclick').text('Continue').attr({"onclick":"finaliseDeleteRoomMateRequest(this)"}).attr({'roomy_request_id':roomy_request_id});

        //call the notificcation modal
        $("#notification_modal").modal({backdrop: 'static', keyboard: false});

    }

    function finaliseDeleteRoomMateRequest(a){

        var roomy_request_id = $(a).attr('roomy_request_id').trim();

        $.post(baseurl+'roomy/mains/delete_roomate_request', {roomy_request_id:roomy_request_id}, function (data, status) {

            var theReturned = JSON.parse(data);

            if(theReturned.error_code == 0){
                returnFunctions.showSuccessToaster(theReturned.success.message, 'success');
                setTimeout(function () {
                    location.reload();
                }, 4000)

            }else if(theReturned.error_code == 0){

                returnFunctions.showSuccessToaster(theReturned.error, 'warning');

            }

        })

    }

    function getCurrentSliderValue(a){

        var current_value = $(a).val().trim();

        $("#rating_of_property_value").text(current_value+'%');

    }

    function removethisAmenity(a){
        $(a).closest('.amennity').remove();
    }
    
</script>


<!-- Modal -->
<div class="modal fade" id="notification_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 100000;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title notification_modal_title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary notification_modal_button">Save changes</button>
            </div>
        </div>
    </div>
</div>
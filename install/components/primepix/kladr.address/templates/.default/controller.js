var KladrApiController = function(token, key){
    var self = this;
    var $ = null;

    var container = null;

    var LabelFormater = function(obj){
        return obj.name;
    }

    var ValueFormater = function(obj){
        return obj.name;
    }

    this.Init = function(token, key){        
        if(!token) return;
        if(!key) return;

        if(typeof(jQuery) == "undefined") {
            alert('jQuery не подключен!');
            return;
        }

        if(!jQuery.ui){
            alert('jQuery UI не подключен!');
            return;
        }

        if(!jQuery.kladrapi){
            alert('jQuery KLADR не подключен!');
            return;
        }

        $ = jQuery;

        $(function(){
            container = $('#kladr-address');

            var options = {
                updateLabels: container.find('[name="update_labels"]').val() == 1,
                deleteNotInKladrValues: container.find('[name="delete_not_in_kladr_values"]').val() == 1,
            };

            var id = container.find('[name="kladr_id"]');
            var zipcode = container.find('[name="zip_code"]');

            var region   = container.find('[name="region"]');
            var district = container.find('[name="district"]');
            var location = container.find('[name="location"]');
            var street   = container.find('[name="street"]');
            var building = container.find('[name="building"]');

            var SetKladrId = function(){
                var regionObj   = region.data( "kladr-obj" );
                var districtObj = district.data( "kladr-obj" );
                var locationObj = location.data( "kladr-obj" );
                var streetObj   = street.data( "kladr-obj" );
                var buildingObj = building.data( "kladr-obj" );

                var regionId   = regionObj ? regionObj.id : false;
                var districtId = districtObj ? districtObj.id : false;
                var locationId = locationObj ? locationObj.id : false;
                var streetId   = streetObj ? streetObj.id : false;
                var buildingId = buildingObj ? buildingObj.id : false;

                if(buildingId){
                    id.val(buildingId);
                    return;
                }

                if(streetId){
                    id.val(streetId);
                    return;
                }

                if(locationId){
                    id.val(locationId);
                    return;
                }

                if(districtId){
                    id.val(districtId);
                    return;
                }

                if(regionId){
                    id.val(regionId);
                    return;
                }
            };

            var SetZipCode = function(){
                var regionObj   = region.data( "kladr-obj" );
                var districtObj = district.data( "kladr-obj" );
                var locationObj = location.data( "kladr-obj" );
                var streetObj   = street.data( "kladr-obj" );
                var buildingObj = building.data( "kladr-obj" );

                var regionZip   = streetObj ? streetObj.zip : false;
                var districtZip = locationObj ? locationObj.zip : false;
                var locationZip = districtObj ? districtObj.zip : false;
                var streetZip   = regionObj ? regionObj.zip : false;
                var buildingZip = buildingObj ? buildingObj.zip : false;

                if(buildingZip){
                    zipcode.val(buildingZip);
                    return;
                }

                if(streetZip){
                    zipcode.val(streetZip);
                    return;
                }

                if(locationZip){
                    zipcode.val(locationZip);
                    return;
                }

                if(districtZip){
                    zipcode.val(districtZip);
                    return;
                }

                if(regionZip){
                    zipcode.val(regionZip);
                    return;
                }
            };

            var SetRegion = function(obj){
                region.data( "kladr-obj", obj );

                var type = obj.type.toLowerCase();
                type = type.charAt(0).toUpperCase() + type.substr(1);

                region.parent().find('[name="region_label"]').val( type );
                region.parent().find('[name="region_label_min"]').val( obj.typeShort );

                if(options.updateLabels){
                    region.parent().find('label').text( type );
                }

                district.kladr( "option", { parentType: $.ui.kladrObjectType.REGION, parentId: obj.id } );
                location.kladr( "option", { parentType: $.ui.kladrObjectType.REGION, parentId: obj.id } );
                street.kladr( "option", { parentType: $.ui.kladrObjectType.REGION, parentId: obj.id } );
                building.kladr( "option", { parentType: $.ui.kladrObjectType.REGION, parentId: obj.id } );

                SetKladrId();
                SetZipCode();
            };

            var SetDistrict = function(obj){
                district.data( "kladr-obj", obj );

                var type = obj.type.toLowerCase();
                type = type.charAt(0).toUpperCase() + type.substr(1);

                district.parent().find('[name="district_label"]').val( type );
                district.parent().find('[name="district_label_min"]').val( obj.typeShort );

                if(options.updateLabels){
                    district.parent().find('label').text( type );
                }

                location.kladr( "option", { parentType: $.ui.kladrObjectType.DISTRICT, parentId: obj.id } );
                street.kladr( "option", { parentType: $.ui.kladrObjectType.DISTRICT, parentId: obj.id } );
                building.kladr( "option", { parentType: $.ui.kladrObjectType.DISTRICT, parentId: obj.id } );

                SetKladrId();
                SetZipCode();
            };

            var SetLocation = function(obj){
                location.data( "kladr-obj", obj );

                var type = obj.type.toLowerCase();
                type = type.charAt(0).toUpperCase() + type.substr(1);

                location.parent().find('[name="location_label"]').val( type );
                location.parent().find('[name="location_label_min"]').val( obj.typeShort );

                if(options.updateLabels){
                    location.parent().find('label').text( type );
                }

                street.kladr( "option", { parentType: $.ui.kladrObjectType.CITY, parentId: obj.id } );
                building.kladr( "option", { parentType: $.ui.kladrObjectType.CITY, parentId: obj.id } );

                SetKladrId();
                SetZipCode();
            };

            var SetStreet = function(obj){
                street.data( "kladr-obj", obj );

                var type = obj.type.toLowerCase();
                type = type.charAt(0).toUpperCase() + type.substr(1);

                street.parent().find('[name="street_label"]').val( type );
                street.parent().find('[name="street_label_min"]').val( obj.typeShort );

                if(options.updateLabels){
                    street.parent().find('label').text( type );
                }

                building.kladr( "option", { parentType: $.ui.kladrObjectType.STREET, parentId: obj.id } );

                SetKladrId();
                SetZipCode();
            };

            var SetBuilding = function(obj){
                building.data( "kladr-obj", obj );

                var type = obj.type.toLowerCase();
                type = type.charAt(0).toUpperCase() + type.substr(1);

                building.parent().find('[name="street_label"]').val( type );
                building.parent().find('[name="street_label_min"]').val( obj.typeShort );

                if(options.updateLabels){
                    building.parent().find('label').text( type );
                }

                SetKladrId();
                SetZipCode();
            };

            region.kladr({
                token: token,
                key: key,
                type: $.ui.kladrObjectType.REGION,
                label: LabelFormater,
                value: ValueFormater,
                select: function( event, ui ) {
                    SetRegion(ui.item.obj);
                }
            });

            district.kladr({
                token: token,
                key: key,
                type: $.ui.kladrObjectType.DISTRICT,
                label: LabelFormater,
                value: ValueFormater,
                select: function( event, ui ) {
                    SetDistrict(ui.item.obj);
                }
            });

            location.kladr({
                token: token,
                key: key,
                type: $.ui.kladrObjectType.CITY,
                label: LabelFormater,
                value: ValueFormater,
                select: function( event, ui ) {
                    SetLocation(ui.item.obj);
                }
            });

            street.kladr({
                token: token,
                key: key,
                type: $.ui.kladrObjectType.STREET,
                label: LabelFormater,
                value: ValueFormater,
                select: function( event, ui ) {
                    SetStreet(ui.item.obj);
                }
            });

            building.kladr({
                token: token,
                key: key,
                type: $.ui.kladrObjectType.BUILDING,
                label: LabelFormater,
                value: ValueFormater,
                select: function( event, ui ) {
                    SetBuilding(ui.item.obj);
                }
            });

            if(options.deleteNotInKladrValues)
            {
                region.change(function(){
                    var query = {
                        query: region.val(),
                        contentType: $.ui.kladrObjectType.REGION,
                        limit: 1
                    };

                    $.kladrapi(query, function(data){
                        var success = data.result.length > 0;
                        if(!success){
                            region.val( '' );
                            region.data( "kladr-obj", null );
                            region.parent().find('[name="region_label"]').val( '' );
                            region.parent().find('[name="region_label_min"]').val( '' );
                            region.parent().find('label').text( 'Область' );
                            return;
                        }

                        //region.val(data.result[0].name);
                        SetRegion(data.result[0]);
                    });
                });

                district.change(function(){
                    var regionObj   = region.data( "kladr-obj" );

                    var query = {
                        query: district.val(),
                        contentType: $.ui.kladrObjectType.DISTRICT,
                        limit: 1
                    };

                    if(regionObj && regionObj.id){
                        query.regionId = regionObj.id;
                    }

                    $.kladrapi(query, function(data){
                        var success = data.result.length > 0;
                        if(!success){
                            district.val('');
                            district.data( "kladr-obj", null );
                            district.parent().find('[name="district_label"]').val( '' );
                            district.parent().find('[name="district_label_min"]').val( '' );
                            district.parent().find('label').text( 'Район' );
                            return;
                        }

                        //district.val(data.result[0].name);
                        SetDistrict(data.result[0]);
                    });
                });

                location.change(function(){
                    var regionObj   = region.data( "kladr-obj" );
                    var districtObj = district.data( "kladr-obj" );

                    var query = {
                        query: location.val(),
                        contentType: $.ui.kladrObjectType.CITY,
                        limit: 1
                    };

                    if(districtObj && districtObj.id){
                        query.districtId = districtObj.id;
                    }
                    else if(regionObj && regionObj.id){
                        query.regionId = regionObj.id;
                    }

                    $.kladrapi(query, function(data){
                        var success = data.result.length > 0;
                        if(!success){
                            location.val('');
                            location.data( "kladr-obj", null );
                            location.parent().find('[name="location_label"]').val( '' );
                            location.parent().find('[name="location_label_min"]').val( '' );
                            location.parent().find('label').text( 'Населённый пункт' );
                            return;
                        }

                        //location.val(data.result[0].name);
                        SetLocation(data.result[0]);
                    });
                });

                street.change(function(){
                    var regionObj   = region.data( "kladr-obj" );
                    var districtObj = district.data( "kladr-obj" );
                    var locationObj = location.data( "kladr-obj" );

                    var query = {
                        query: street.val(),
                        contentType: $.ui.kladrObjectType.STREET,
                        limit: 1
                    };

                    if(locationObj && locationObj.id){
                        query.cityId = locationObj.id;
                    }
                    else if(districtObj && districtObj.id){
                        query.districtId = districtObj.id;
                    }
                    else if(regionObj && regionObj.id){
                        query.regionId = regionObj.id;
                    }

                    $.kladrapi(query, function(data){
                        var success = data.result.length > 0;
                        if(!success){
                            street.val('');
                            street.data( "kladr-obj", null );
                            street.parent().find('[name="street_label"]').val( '' );
                            street.parent().find('[name="street_label_min"]').val( '' );
                            street.parent().find('label').text( 'Улица' );
                            return;
                        }

                        //street.val(data.result[0].name);
                        SetStreet(data.result[0]);
                    });
                });

                building.change(function(){
                    var regionObj   = region.data( "kladr-obj" );
                    var districtObj = district.data( "kladr-obj" );
                    var locationObj = location.data( "kladr-obj" );
                    var streetObj   = street.data( "kladr-obj" );

                    var query = {
                        query: building.val(),
                        contentType: $.ui.kladrObjectType.BUILDING,
                        limit: 1
                    };

                    if(streetObj && streetObj.id){
                        query.streetId = streetObj.id;
                    }
                    else if(locationObj && locationObj.id){
                        query.cityId = locationObj.id;
                    }
                    else if(districtObj && districtObj.id){
                        query.districtId = districtObj.id;
                    }
                    else if(regionObj && regionObj.id){
                        query.regionId = regionObj.id;
                    }

                    $.kladrapi(query, function(data){
                        var success = data.result.length > 0;
                        if(!success){
                            building.val('');
                            building.data( "kladr-obj", null );
                            building.parent().find('[name="building_label"]').val( '' );
                            building.parent().find('[name="building_label_min"]').val( '' );
                            building.parent().find('label').text( 'Дом' );
                            return;
                        }

                        SetBuilding(data.result[0]);
                    });
                });
            }
        });

    }

    self.Init(token, key);
    return self;
}

var KladrApiControllerInit = function(token, key){
    KladrApiController = new KladrApiController(token, key);
}
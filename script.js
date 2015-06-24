app = angular.module('vrqc', ['ngSanitize']);

app.controller('vrqcPropCtrl', function($scope, data){
    $scope.window = data[3];
    $scope.vrqc = data[0];
    $scope.nav = data[1];
    $scope.index = data[2];
    $scope.show = {rooms:0};
    $scope.getTheId = data[0].propertySlug;
		$scope.getDate = Date.now();

}).factory('data', function($http, $timeout, $location, $sce, $rootScope, $window){

    var window = $window;
    var vrqc = {
        propertiesData:{},
        propertiesObject:{},
        propertiesObjectById:{},
        postsData:{},
        postsObject:{},
        postData:{},
        offersData:{},
        weather:{}
    };
    var nav = {
        property: ['Overview','Rates','Location','Reviews'],
        properties: ['All', '1 BR', '2 BR', '3 BR', '4+ BR'],
        categories:[]
    };
    var index = {
        postsById:{},
        postsBySlug:{},
        postsByCategory:{},
        propertiesById:{},
        propertiesBySlug:{},
        propertyPostsById:{},
        propertyPostsBySlug:{},
        propertyPostsByRoomcount:{'1':[],'2':[],'3':[],'4':[],many:[]},
        propertyPostsByTerm:{'short':[],'long':[]},
        propertyPostsByTermAndRoomcount: {
            'short': {'1': [], '2': [], '3': [], '4': [], many: []},
            'long': {'1': [], '2': [], '3': [], '4': [], many: []}
        }
    };
    $timeout(function(){

        // Property Posts
        $http.get($rootScope.siteUrl+'/?json=get_posts&cat=7')
            .success(function (data, status, headers, config) {
                vrqc.propertyPosts = data;
                angular.forEach(data.posts, function (post) {
                    index.propertyPostsBySlug[post.slug]=post.id;
                    index.propertyPostsById[post.id]=post.slug;
                    vrqc.propertiesObjectById[post.id]=post;
                    if(index.propertyPostsByTermAndRoomcount[post.custom_fields.term[0]][post.custom_fields.roomcount[0]]){
                        index.propertyPostsByTermAndRoomcount[post.custom_fields.term[0]][post.custom_fields.roomcount[0]].push(post.id);
                        index.propertyPostsByRoomcount[post.custom_fields.roomcount[0]].push(post.id);
                    }


                    /*if (post.custom_fields.term && post.custom_fields.term[0] == 'long' ){
                        index.propertyPostsByTermAndRoomcount['long'][post.custom_fields.roomcount[0]].push(post.id);
                        index.propertyPostsByTerm['long'].push(post.id);
                    } else {
                        index.propertyPostsByTermAndRoomcount['short'][post.custom_fields.roomcount[0]].push(post.id);
                        index.propertyPostsByTerm['short'].push(post.id);
                    }*/


                    /*if (post.custom_fields.roomcount[0] === '1'){
                        index.propertyPostsByRoomcount['1'].push(post);
                    } else if (post.custom_fields.roomcount[0] === '2'){
                        index.propertyPostsByRoomcount['2'].push(post);
                    } else if (post.custom_fields.roomcount[0] === '3'){
                        index.propertyPostsByRoomcount['3'].push(post);
                    } else if (post.custom_fields.roomcount[0] === '4'){
                        index.propertyPostsByRoomcount['4'].push(post);
                    } else {
                        index.propertyPostsByRoomcount.many.push(post);
                    }*/
                });

            }).error(function (data, status, headers, config) {
        });

        // Property Resources
        $http.get($rootScope.siteUrl+'/api/get_posts/?post_type=easy-rooms')
            .success(function (data, status, headers, config) {
                vrqc.propertiesData = data;
                angular.forEach(vrqc.propertiesData.posts, function(property){
                    vrqc.propertiesObject[property.slug]=property;
                    index.propertiesById[property.id]=property.slug;
                    index.propertiesBySlug[property.slug]=property.id;

                    $http.get($rootScope.siteUrl+'/api/get_post/?slug='+property.slug).success(function(data){
                        var status = data.status,
                            post = data.post,
                            nonce = '',
                            updateNonce = '';

                        // Gets create permission key if admin is logged in
                        $http.get($rootScope.siteUrl+'/?json=core.get_nonce&controller=posts&method=create_post')
                            .success(function(data, status, headers, config){
                                nonce = data.nonce;
                            }).error(function(data, status, headers, config){
                            });
                        // Gets update permission key if admin is logged in
                        $http.get($rootScope.siteUrl+'/?json=core.get_nonce&controller=posts&method=update_post')
                            .success(function(data, status, headers, config){
                                updateNonce = data.nonce;
                            }).error(function(data, status, headers, config){
                            });

                        $timeout(function(){
                        // Creates a new post from a new resource
                            if( status === 'error' ) {
                                var custom = '';
                                var propertyProperties = ['type','amenities','suitability','sleeps','bathrooms','entertainment','kitchen','address', 'rate-info','off-peak-night', 'off-peak-week','peak-night', 'peak-week'];
                                angular.forEach(property.custom_fields, function(value,field){
                                    custom = custom + '&custom['+field+']='+encodeURI(value);
                                });
                                angular.forEach(propertyProperties, function(property){
                                    custom = custom + '&custom['+property+']=';
                                });

                                var createPostUrl = $rootScope.siteUrl+'/?json=create_post&nonce=' + nonce + '&title=' + encodeURI(property.title) + '&categories=properties&status=publish&'+custom;
                                if (!index.propertyPostsBySlug[property.slug]) {
                                    $http.get(createPostUrl)
                                        .success(function (data, status, headers, config) {
                                        }).error(function (data, status, headers, config) {
                                    });
                                }
                            }/* else if(status === 'ok' && property.custom_fields != post.custom_fields){

                                 $timeout(function(){
                                 var custom = '';
                                 angular.forEach(property.custom_fields, function(value,field){
                                 custom = custom + '&custom_field['+field+']='+encodeURI(value);
                                 });
                                 var updatePostUrl = $rootScope.siteUrl+'/api/posts/update_post/?slug=' + property.slug + '&nonce=' + updateNonce + custom;
                                 $http.get(updatePostUrl)
                                 .success(function (data, status, headers, config) {
                                 }).error(function (data, status, headers, config) {
                                 });
                                 },2000)
                            }*/
                        },3000);

                    });
                })
            }).error(function (data, status, headers, config) {
            });
        // All regular posts
        $http.get($rootScope.siteUrl+'/?json=get_posts&cat=-5,-2,-7')
            .success(function (data, status, headers, config) {
                vrqc.postsData = data;
                angular.forEach(vrqc.postsData.posts, function (post) {
                    vrqc.postsObject[post.slug]=post;
                    index.postsById[post.id]=post.slug;
                    index.postsBySlug[post.slug]=post.id;
                    if (!index.postsByCategory[post.categories[0].slug]) {
                        index.postsByCategory[post.categories[0].slug] = [post.id];
                        nav.categories.push(post.categories[0].slug);
                    } else {
                        index.postsByCategory[post.categories[0].slug].push(post.id);
                    }
                })

            }).error(function (data, status, headers, config) {
            });
        // Specific Post or Page
        $http.get($location.$$absUrl+'?json=1')
            .success(function (data, status, headers, config) {
              $timeout(function(){
                  vrqc.postData = data;
                // Get Corresponding Property Data
                if(data.post && data.post.categories[0].slug === 'properties'){
                    vrqc.propertyData = vrqc.propertiesObjectById[data.post.id];
                    vrqc.propertyDataId = vrqc.propertyData['id'];
                }
              }, 3000);
            }).error(function (data, status, headers, config) {
            });
        // Offer Posts
        $http.get($rootScope.siteUrl+'/?json=get_posts&cat=5')
            .success(function (data, status, headers, config) {
                vrqc.offersData = data;
            }).error(function (data, status, headers, config) {
            });
        $timeout(function(){
            $http.get('http://api.wunderground.com/api/d26d4a3f9b087f03/geolookup/conditions/q/Canada/Québec.json')
                .success(function (data, status, headers, config) {
                    vrqc.weather = data.current_observation;
                }).error(function (data, status, headers, config) {
            });
        },3000);
        // Weather API

    },0);

    vrqc.encode = function(string){
        return $sce.trustAsHtml(encodeURI(string));
    };

    vrqc.trust = function(str){
        var encodedStr = encodeURI(str);
        return $sce.trustAsResourceUrl(encodedStr);
    };

    vrqc.addToArray = function (arr, item) {
        return arr.push(item)
    };

    vrqc.propertySlug = function(id) {
        var slug = '';
        $timeout(function () {
            angular.forEach(vrqc.propertyPosts.posts, function(property){
                if (property.id == id) {
                    slug = property.slug;
                    return slug;
                }
            });

        },6000);

    };

    return [vrqc, nav, index, window];

    /*        $scope.propertyID = function(properties, url) {
     $timeout(function(url){
     },5000);
     }*/
});
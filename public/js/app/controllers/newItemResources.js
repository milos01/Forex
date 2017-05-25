(function(angular){
	
	app.factory('newItemResources',function(Restangular){
		
		var retVal = {};
		
		retVal.postBlog = function(blog){
			return Restangular.all('blog').post(blog).then(function(item){
				return item;
			});
		}

		return retVal;
	})
	
})(angular);
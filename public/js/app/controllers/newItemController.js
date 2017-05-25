(function (angular) {
    app.controller('newItemController', function($scope, newItemResources) {
        var vm = this;
        $scope.options = {
          height: 320,
          toolbar: [
                ['edit',['undo','redo']],
                ['headline', ['style']],
                ['style', ['bold', 'italic', 'underline', 'superscript', 'subscript', 'strikethrough', 'clear']],
                ['fontface', ['fontname']],
                ['textsize', ['fontsize']],
                ['fontclr', ['color']],
                ['alignment', ['ul', 'ol', 'paragraph', 'lineheight']],
                ['height', ['height']],
                ['insert', ['link','picture','video','hr']],
                ['view', ['fullscreen']]
            ]
        };

        vm.addNewItemFormSubmit = function(){
            
            vm.blog = {
                'title': vm.title,
                'content': vm.text,
                'category': vm.category,
                'tags': vm.tags
            }

            newItemResources.postBlog(vm.blog).then(function(item){
                console.log(item);
            });
        }
    });
})(angular);
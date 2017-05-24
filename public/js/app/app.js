(function (angular) {
    app = angular.module('forexApp', ['summernote']);

    app.controller('summernoteController', function($scope) {
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

    // $scope.text = "Hello World <strong>from Slovakia</strong>!";
  });
})(angular);
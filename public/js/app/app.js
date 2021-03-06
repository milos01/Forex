(function (angular) {
    app = angular.module('forexApp', ['summernote', 'ngSanitize', 'restangular']);

    app.run(function(Restangular, $log) {
      var headers = {
        'Content-Type' : 'Application/json',
        'Accept' : 'application/x.laravel.v1+json'
      };
      Restangular.setDefaultHeaders(headers);
      Restangular.setBaseUrl("api");
      Restangular.setErrorInterceptor(function(response) {
          if (response.status === 500) {
              $log.info("internal server error");
              return true;
          }
          return true; // greska nije obradjena
      });
    });
})(angular);
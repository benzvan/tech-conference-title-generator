var chakram = require('chakram');
  expect = chakram.expect;

var baseURL = "http://conferencetitle.zvan.net"

describe("Chakram", function () {
  it("should respond with 200", function () {
    return chakram.get( baseURL + "/get/noun")
    .then(function (searchResponse) {
      var noun = searchResponse.body.string;
      expect(noun).to.not.equal('');
    })
  });
});

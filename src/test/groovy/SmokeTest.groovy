import groovyx.net.http.RESTClient
import spock.lang.*

import spock.lang.Specification


class smokeTest extends Specification {

    @Shared
    RESTClient client = new RESTClient('http://localhost/')

    def "Get noun returns string"() {
        when: "We ask for a noun"
        def response = client.get(path : "/get/noun/")

        then: "We should get a valid json response containing a noun"
        notThrown(Exception)
        response.status                             == 200
        response.contentType                        == 'application/json'
        response.data                               != null
        response.data.string		            != ''
	response.data.string			    != 'No'
    }

    def "Get noun/plural returns string"() {
        when: "We ask for a plural noun"
        def response = client.get(path : "/get/noun/plural")

        then: "We should get a valid json response containing a noun"
        notThrown(Exception)
        response.status                             == 200
        response.contentType                        == 'application/json'
        response.data                               != null
        response.data.string		            != ''
    }

    def "Get adjective returns string"() {
        when: "We ask for an adjective"
        def response = client.get(path : "/get/adjective/")

        then: "We should get a valid response containing an adjective"
        notThrown(Exception)
        response.status                             == 200
        response.contentType                        == 'application/json'
        response.data                               != null
        response.data.string		            != ''
    }

    def "Get verb returns string"() {
        when: "We ask for a verb"
        def response = client.get(path : "/get/verb/")

        then: "We should get a valid response containing a verb"
        notThrown(Exception)
        response.status                             == 200
        response.contentType                        == 'application/json'
        response.data                               != null
        response.data.string		            != ''
    }

    def "Get addon phrase returns string"() {
        when: "We ask for an addon phrase"
        def response = client.get(path : "/get/addonPhrase/")

        then: "We should get a valid response containing an addon phrase"
        notThrown(Exception)
        response.status                             == 200
        response.contentType                        == 'application/json'
        response.data                               != null
        response.data.string		            != ''
    }

    def "Get title format returns string"() {
        when: "We ask for a title format"
        def response = client.get(path : "/get/titleFormat/")

        then: "We should get a valid response containing a title format"
        notThrown(Exception)
        response.status                             == 200
        response.contentType                        == 'application/json'
        response.data                               != null
        response.data.string		            != ''
    }

}

import groovyx.net.http.RESTClient
import spock.lang.*

import spock.lang.Specification


class testSpecification extends Specification {

    @Shared
    RESTClient client = new RESTClient('https://redsky.internal-csp1-w2-target.com')

    def "Get pdp returns data for specific tcin"() {
        when: "We ask for a tcin"
        String tcin = '12959727'
        def response = client.get(path : "/v1/pdp/tcin/" + tcin)

        then: "We should get a valid response containing the tcin"
        notThrown(Exception)
        response.status                             == 200
        response.contentType                        == 'application/json'
        response.data                               != null
        response.data.product.price.partNumber      == tcin
    }

    def "Get pdp returns error with missing tcin"() {
        when: "We ask for a tcin without a tcin"
        def response = client.get(path : "/v1/pdp/tcin/")

        then: "We should get an error"
        thrown(Exception)
    }
}

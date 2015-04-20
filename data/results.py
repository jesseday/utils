import argv from sys
import urllib2

url = 'https://api.results.com/api/v1/'
endpoint = argv[0]
urllib2.Request(url + endpoint)


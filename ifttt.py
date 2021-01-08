#!/usr/bin/python

# Small script to take two inputs and feed them to an IFTTT event named kawhat_answered
# By John Madon for the Kawhat Project

import os
import sys
import subprocess

key = ""
url = ""
event_id = "kawhat_answered"

if os.path.exists('./key'):
    key = open('./key', 'r').read()

url = "https://maker.ifttt.com/trigger/kawhat_answered/with/key/{}".format(key).strip('\r').strip('\n')

if len(sys.argv) == 3 and len(key) > 0:
   arg1 = sys.argv[1]
   arg2 = sys.argv[2]
   data = '{{"value1":"{}","value2":"{}","value3":""}}'.format(arg1, arg2)
   command = "/usr/bin/curl -X POST -H 'Content-Type: application/json' -d '{}' {}".format(data, url)
   #print("Command: {}".format(command))
   #cmd = command.split(' ')
   #print(cmd)
   #proc = subprocess.Popen(cmd, stdin=subprocess.PIPE)
   #result = proc.communicate()
   result = os.system(command)
   print(result)
else:
   raise Exception("Error. Key missing or not enough arguments given.")

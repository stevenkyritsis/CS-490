#!/usr/bin/env python3

import sys

data = sys.argv[1]
answer1 = sys.argv[2]
answer2 = sys.argv[2]

listed = data.split('\n')

answer1_list = answer1.split('\n')
answer2_list = answer2.split('\n')

status = False

for i in range(len(listed)):
    try:
        if listed[i] == answer1_list[i] or listed[i] == answer2_list:
            status = True
            continue
        else:
            status = False 
    except IndexError:
        print(status)
        exit

print(status)
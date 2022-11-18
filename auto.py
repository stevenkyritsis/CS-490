#!/usr/bin/env python3

import sys

data = sys.argv[1]
answer_array = sys.argv[2]

listed = data.split('\n')

status = []

for i in range(len(answer_array)):
        answer_list = answer_array[i].split('\n')
        for j in range(len(listed)):
            try:
                if listed[j] == answer_list[i] or listed[i]:
                    status.append([True])
                    break
                else:
                    status.append(False) 
            except IndexError:
                status = False
                print(status)
                exit

print(status)
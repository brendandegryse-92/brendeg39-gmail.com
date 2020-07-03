import os
import sys
import fileinput
import glob

textToSearch = "Passterm"
textToReplace = "Pass"


for fileToSearch in glob.glob("*.php"):
    with fileinput.FileInput(fileToSearch, inplace=True) as file:
        for line in file:
            print(line.replace(textToSearch, textToReplace), end='')


input( '\n\n Press Enter to exit...' )

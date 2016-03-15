import glob
import os
files = glob.glob("*")
def replace_tab(file):
    with open(file) as f:
        str=f.readlines()
    with open(file,"w") as fw:

        for i in str:
            j=i.replace("\t","    ")
            fw.write(j)

def digui(files):
    for f in files:
        if os.path.isdir(f):
             digui(glob.glob("%s/*"%f))
        elif f[-4:]==".php":
            replace_tab(f)
            #print(f)

digui(files)

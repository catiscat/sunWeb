import glob
import os
files = glob.glob("*")
def replace_tab(file):
    '''
    This function is to replace Tab with 4 blank 
    '''
    with open(file) as f:
        str=f.readlines()
    with open(file,"w") as fw:

        for i in str:
            j=i.replace("\t","    ")
            fw.write(j)

def recursion(files,tail):

    for f in files:
        if os.path.isdir(f):
             recursion(glob.glob("%s/*"%f))
        elif f[-4:]==tail:
            replace_tab(f)
            #print(f)
if __name__=="__main__":
    recursion(files,".php")

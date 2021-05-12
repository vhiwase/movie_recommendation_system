import subprocess
import pathlib

FILE_PATH = pathlib.PosixPath(__file__)

BASE_PATH = FILE_PATH.parent
file = (BASE_PATH/"project/www/html/webdictionary.txt").absolute().as_posix()

def get_public_ip():
    bashCommand = """host myip.opendns.com resolver1.opendns.com | grep "myip.opendns.com has" | awk '{print $4}'"""
    my_public_ip = subprocess.getoutput(bashCommand)
    with open(file, 'w') as f:
        f.write("http://{}:5000/home".format(my_public_ip))
    return my_public_ip

if __name__ == '__main__':
    my_public_ip = get_public_ip()
    print(my_public_ip)
    with open(file, 'w') as f:
        f.write("http://{}:5000/home".format(my_public_ip))
        
        
        





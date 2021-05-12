import subprocess

def get_public_ip():
    bashCommand = """host myip.opendns.com resolver1.opendns.com | grep "myip.opendns.com has" | awk '{print $4}'"""
    process = subprocess.Popen(bashCommand.split(), stdout=subprocess.PIPE)
    output, error = process.communicate()
    my_public_ip = str(output)
    my_public_ip = my_public_ip.strip("'").strip('\\n')
    addr_text = 'myip.opendns.com has address '
    from_index = my_public_ip.index(addr_text)
    my_public_ip = my_public_ip[from_index+len(addr_text):].strip().strip('\n')
    return my_public_ip


if __name__ == '__main__':
    my_public_ip = get_public_ip()
import os
path = os.path.dirname(__file__)
file = os.path.basename(__file__)
files = os.listdir(".")
files.remove(file)

for file in files:
    file_path = os.path.join(path, file)
    os.remove(file_path)

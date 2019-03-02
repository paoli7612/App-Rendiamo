import xml.etree.ElementTree as et
import os, copy

class User:
    def __init__(self, element):
        self.element = element
        self.data = dict()
        for sub in element:
            self.data[sub.tag] = sub

    def change(self, key, value):
        self.data[key].text = value

    def __str__(self):
        txt = self.data["nome"].text + " " + self.data["cognome"].text + "\n"
        txt += self.data["dataDiNascita"].text + " " + self.data["sesso"].text
        return txt

class Users:
    def __init__(self):
        path = os.path.dirname(__file__)
        self.xml_path = os.path.join(path, "data.xml")
        self.tree = et.parse(self.xml_path)
        self.root = self.tree.getroot()
        self.read_users()

    def read_users(self):
        self.data = list()
        for e in self.root:
            u = User(e)
            self.data.append(u)

    def new_user(self, args):
        element = copy.copy(self.data[-1].element)
        for n,v in enumerate(args.split()):
            element[n].text = v
        self.root.append(element)

    def del_user(self, id):
        user = self.data[id]
        element = user.element
        self.root.remove(element)

    def save(self):
        self.tree.write(self.xml_path)


if __name__ == "__main__":
    us = Users()
    us.data[0].change("nome", "Tommaso")
    print(us.data[0])
    #us.new_user("Mario Rossi 34/87/1222 M marietto@gmail.com 377652837")
    us.del_user(0)
    us.save()

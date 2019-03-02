import tkinter

class Draw:
    def __init__(self, master):
        self.master = master
        self.inputs = dict()
    def reset(self):
        for entry in self.inputs.values():
            entry.destroy()
    def button(self, text, func, x, y):
        b = tkinter.Button(self.master, text=text, command=func)
        b.grid(row=y, column=x)
    def label(self, text, x, y):
        l = tkinter.Label(self.master, text=text)
        l.grid(row=y, column=x)
    def input(self, text, x, y):
        i = tkinter.Entry()
        try: i.insert(0, text)
        except: pass
        i.grid(row=y, column=x)
        self.inputs[text] = i

class Gui(Draw):
    def __init__(self, users):
        self.root = tkinter.Tk()
        Draw.__init__(self, self.root)
        self.users = users

        self.bar = tkinter.Menu()
        filemenu = tkinter.Menu(self.bar, tearoff=0)
        filemenu.add_command(label="Visualizza", command=self.show_users)
        filemenu.add_command(label="Modifica", command=self.edit_users)
        self.bar.add_cascade(label="Utenti", menu=filemenu)
        self.root.config(menu=self.bar)

        tkinter.mainloop()

    def index_users(self):
        self.reset()
        for x, k in enumerate(self.users.data[0].data.keys()):
            self.label(k, x, 0)


    def edit_users(self):
        self.index_users()
        for y,user in enumerate(self.users.data):
            for x,v in enumerate(user.data.values()):
                self.input(v.text, x, y+1)

    def show_users(self):
        self.index_users()
        for y,user in enumerate(self.users.data):
            for x,v in enumerate(user.data.values()):
                self.label(v.text, x, y+1)


if __name__ == "__main__":
    from users import Users
    us = Users()
    g = Gui(us)

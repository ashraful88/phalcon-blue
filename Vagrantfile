Vagrant.configure(2) do |config|

  config.vm.box = "ubuntu/ubuntu-16.04"
  config.vm.box_url = "https://cloud-images.ubuntu.com/xenial/current/xenial-server-cloudimg-amd64-vagrant.box"
  config.vm.hostname = "jungle"
  config.vm.network "private_network", ip: "192.168.33.133"

   config.vm.provider "virtualbox" do |vb|
     vb.name = "jungle"
     vb.cpus = 2
     vb.memory = "2048"
   end

  config.ssh.shell="bash"
  config.vm.provision "shell", path: "deploy/ubuntu-bootstrap.sh"
  config.vm.synced_folder "../phalcon-blue", "/var/www/html/phalcon-blue"

end

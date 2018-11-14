-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 14, 2018 at 03:33 PM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scribo_cursim`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `name`) VALUES
(1, 'the Bible DRA'),
(2, 'Saint'),
(3, 'Pope'),
(4, 'Missal'),
(5, 'Prayers');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcategoryID` int(15) NOT NULL,
  `categoryID` int(15) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcategoryID`, `categoryID`, `name`) VALUES
(1, 1, 'Mark'),
(2, 1, 'Matthew'),
(3, 1, 'Luke'),
(4, 1, 'John'),
(5, 1, 'Acts'),
(6, 1, 'Romans'),
(7, 1, 'Genesis'),
(8, 1, 'Exodus'),
(9, 1, 'Leviticus'),
(10, 1, 'Deuteronomy'),
(11, 1, 'Matthew'),
(12, 1, 'Luke'),
(13, 1, 'John'),
(14, 1, 'Acts'),
(15, 1, 'Romans'),
(16, 1, 'Genesis'),
(17, 1, 'Exodus'),
(18, 1, 'Leviticus'),
(19, 1, 'Deuteronomy'),
(20, 1, 'Numbers'),
(21, 2, 'St Thomas Aquinas'),
(22, 2, 'St Robert Bellarmine'),
(23, 2, 'St Louis de Montfort'),
(24, 2, 'St Peter Damian'),
(25, 2, 'St Augustine'),
(26, 3, 'Pope Pius XI'),
(27, 1, 'Revelation'),
(28, 4, 'Foot of Altar prayers'),
(29, 4, 'Confiteor'),
(30, 4, 'John\'s Gospel'),
(31, 4, 'Offertory end'),
(32, 4, 'Gloria'),
(33, 4, 'Credo'),
(34, 4, 'Sanctus'),
(35, 4, 'Sacristy prayers'),
(36, 5, 'St Michael');

-- --------------------------------------------------------

--
-- Table structure for table `texts`
--

CREATE TABLE `texts` (
  `id` int(11) NOT NULL,
  `text` varchar(4096) COLLATE utf8_bin DEFAULT NULL,
  `subcategoryID` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `texts`
--

INSERT INTO `texts` (`id`, `text`, `subcategoryID`) VALUES
(1, 'Blessed are the poor in spirit: for theirs is the kingdom of heaven. Blessed are the meek: for they shall possess the land. Blessed are they that mourn: for they shall be comforted. Blessed are they that hunger and thirst after justice: for they shall have their fill. Blessed are the merciful: for they shall obtain mercy. Blessed are the clean of heart: for they shall see God. Blessed are the peacemakers: for they shall be called children of God. Blessed are they that suffer persecution for justice\' sake: for theirs is the kingdom of heaven. Blessed are ye when they shall revile you, and persecute you, and speak all that is evil against you, untruly, for my sake:', 2),
(2, 'A good man out of the good treasure of his heart bringeth forth that which is good: and an evil man out of the evil treasure bringeth forth that which is evil. For out of the abundance of the heart the mouth speaketh. And why call you me, Lord, Lord; and do not the things which I say? Every one that cometh to me, and heareth my words, and doth them, I will shew you to whom he is like.', 3),
(3, 'Then Jesus was led by the spirit into the desert, to be tempted by the devil. And when he had fasted forty days and forty nights, afterwards he was hungry. And the tempter coming said to him: If thou be the Son of God, command that these stones be made bread. Who answered and said: It is written, Not in bread alone doth man live, but in every word that proceedeth from the mouth of God. Then the devil took him up into the holy city, and set him upon the pinnacle of the temple, And said to him: If thou be the Son of God, cast thyself down, for it is written: That he hath given his angels charge over thee, and in their hands shall they bear thee up, lest perhaps thou dash thy foot against a stone. Jesus said to him: It is written again: Thou shalt not tempt the Lord thy God. Again the devil took him up into a very high mountain, and shewed him all the kingdoms of the world, and the glory of them, And said to him: All these will I give thee, if falling down thou wilt adore me. Then Jesus saith to him: Begone, Satan: for it is written, The Lord thy God shalt thou adore, and him only shalt thou serve. Then the devil left him; and behold angels came and ministered to him.', 2),
(4, 'But know this ye, that if the goodman of the house knew at what hour the thief would come, he would certainly watch, and would not suffer his house to be broken open. Wherefore be you also ready, because at what hour you know not the Son of man will come. Who, thinkest thou, is a faithful and wise servant, whom his lord hath appointed over his family, to give them meat in season. Blessed is that servant, whom when his lord shall come he shall find so doing. Amen I say to you, he shall place him over all his goods. But if that evil servant shall say in his heart: My lord is long a coming: And shall begin to strike his fellow servants, and shall eat and drink with drunkards: The lord of that servant shall come in a day that he hopeth not, and at an hour that he knoweth not: And shall separate him, and appoint his portion with the hypocrites. There shall be weeping and gnashing of teeth.', 2),
(5, 'I am the bread of life. Your fathers did eat manna in the desert, and are dead. This is the bread which cometh down from heaven; that if any man eat of it, he may not die. I am the living bread which came down from heaven. If any man eat of this bread, he shall live for ever; and the bread that I will give, is my flesh, for the life of the world. The Jews therefore strove among themselves, saying: How can this man give us his flesh to eat? Then Jesus said to them: Amen, amen I say unto you: Except you eat the flesh of the Son of man, and drink his blood, you shall not have life in you. He that eateth my flesh, and drinketh my blood, hath everlasting life: and I will raise him up in the last day. For my flesh is meat indeed: and my blood is drink indeed. He that eateth my flesh, and drinketh my blood, abideth in me, and I in him. As the living Father hath sent me, and I live by the Father; so he that eateth me, the same also shall live by me. This is the bread that came down from heaven. Not as your fathers did eat manna, and are dead. He that eateth this bread, shall live for ever.', 4),
(6, 'And a great sign appeared in heaven: A woman clothed with the sun, and the moon under her feet, and on her head a crown of twelve stars: And being with child, she cried travailing in birth, and was in pain to be delivered. And there was seen another sign in heaven: and behold a great red dragon, having seven heads, and ten horns: and on his head seven diadems: And his tail drew the third part of the stars of heaven, and cast them to the earth: and the dragon stood before the woman who was ready to be delivered; that, when she should be delivered, he might devour her son. And she brought forth a man child, who was to rule all nations with an iron rod: and her son was taken up to God, and to his throne.', 27),
(7, 'The fact that the evil ones, as long as they live, can be corrected from their errors does not prohibit that they may be justly executed, for the danger which threatens from their way of life is greater and more certain than the good which may be expected from their improvement. They also have at that critical point of death the opportunity to be converted to God through repentance. And if they are so obstinate that even at the point of death their heart does not draw back from malice, it is possible to make a quite probable judgment that they would never come away from evil.', 21),
(8, 'But no reason, however grave, may be put forward by which anything intrinsically against nature may become conformable to nature and morally good. Since, therefore, the conjugal act is destined primarily by nature for the begetting of children, those who, in exercising it, deliberately frustrate its natural power and purpose, sin against nature and commit a deed which is shameful and intrinsically vicious.', 26),
(9, 'Every judgement of conscience, be it right or wrong, be it about things evil in themselves or morally indifferent, is obligatory, in such wise that he who acts against his conscience always sins.', 21),
(10, 'Man cannot live without joy; therefore when he is deprived of true spiritual joys it is necessary that he become addicted to carnal pleasures.', 21),
(11, 'Good can exist without evil, whereas evil cannot exist without good.', 21),
(12, 'Those offences which be contrary to nature are everywhere and at all times to be held in detestation and punished; such were those of the Sodomites, which should all nations commit, they should all be held guilty of the same crime by the divine law, which hath not so made men that they should in that way abuse one another. For even that fellowship which should be between God and us is violated, when that same nature of which He is author is polluted by the perversity of lust.', 25),
(13, 'Truly, this vice is never to be compared with any other vice because it surpasses the enormity of all vices. It defiles everything, stains everything, pollutes everything. And as for itself, it permits nothing pure, nothing clean, nothing other than filth...', 24),
(14, 'For never will anyone who says his Rosary every day become a formal heretic or be led astray by the devil. This is a statement I would gladly sign with my blood.', 23),
(15, 'Then Herod perceiving that he was deluded by the wise men, was exceeding angry; and sending killed all the men children that were in Bethlehem, and in all the borders thereof, from two years old and under, according to the time which he had diligently inquired of the wise men. Then was fulfilled that which was spoken by Jeremias the prophet, saying A voice in Rama was heard, lamentation and great mourning; Rachel bewailing her children, and would not be comforted, because they are not.', 2),
(16, 'You have heard that it was said to them of old: Thou shalt not commit adultery. But I say to you, that whosoever shall look on a woman to lust after her, hath already committed adultery with her in his heart. And if thy right eye scandalize thee, pluck it out and cast it from thee. For it is expedient for thee that one of thy members should perish, rather than that thy whole body be cast into hell. And if thy right hand scandalize thee, cut it off, and cast it from thee: for it is expedient for thee that one of thy members should perish, rather than that thy whole body be cast into hell. And it hath been said, Whosoever shall put away his wife, let him give her a bill of divorce. But I say to you, that whosoever shall put away his wife, excepting for the cause of fornication, maketh her to commit adultery: and he that shall marry her that is put away, committeth adultery.', 2),
(17, 'Take heed that you do not your justice before men, to be seen by them: otherwise you shall not have a reward of your Father who is in heaven. Therefore when thou dost an almsdeed, sound not a trumpet before thee, as the hypocrites do in the synagogues and in the streets, that they may be honoured by men. Amen I say to you, they have received their reward. But when thou dost alms, let not thy left hand know what thy right hand doth. That thy alms may be in secret, and thy Father who seeth in secret will repay thee. And when ye pray, you shall not be as the hypocrites, that love to stand and pray in the synagogues and corners of the streets, that they may be seen by men: Amen I say to you, they have received their reward. But thou when thou shalt pray, enter into thy chamber, and having shut the door, pray to thy Father in secret: and thy Father who seeth in secret will repay thee. And when you are praying, speak not much, as the heathens. For they think that in their much speaking they may be heard. Be not you therefore like to them, for your Father knoweth what is needful for you, before you ask him.', 2),
(18, 'For if you will forgive men their offences, your heavenly Father will forgive you also your offences. But if you will not forgive men, neither will your Father forgive you your offences. And when you fast, be not as the hypocrites, sad. For they disfigure their faces, that they may appear unto men to fast. Amen I say to you, they have received their reward. But thou, when thou fastest anoint thy head, and wash thy face; That thou appear not to men to fast, but to thy Father who is in secret: and thy Father who seeth in secret, will repay thee. Lay not up to yourselves treasures on earth: where the rust, and moth consume, and where thieves break through and steal. But lay up to yourselves treasures in heaven: where neither the rust nor moth doth consume, and where thieves do not break through, nor steal. For where thy treasure is, there is thy heart also.', 2),
(19, 'Behold the birds of the air, for they neither sow, nor do they reap, nor gather into barns: and your heavenly Father feedeth them. Are not you of much more value than they? And which of you by taking thought, can add to his stature by one cubit? And for raiment why are you solicitous? Consider the lilies of the field, how they grow: they labour not, neither do they spin. But I say to you, that not even Solomon in all his glory was arrayed as one of these. And if the grass of the field, which is to day, and to morrow is cast into the oven, God doth so clothe: how much more you, O ye of little faith? Be not solicitous therefore, saying, What shall we eat: or what shall we drink, or wherewith shall we be clothed? For after all these things do the heathens seek. For your Father knoweth that you have need of all these things. Seek ye therefore first the kingdom of God, and his justice, and all these things shall be added unto you. Be not therefore solicitous for to morrow; for the morrow will be solicitous for itself. Sufficient for the day is the evil thereof.', 2),
(20, 'Ask, and it shall be given you: seek, and you shall find: knock, and it shall be opened to you. For every one that asketh, receiveth: and he that seeketh, findeth: and to him that knocketh, it shall be opened. Or what man is there among you, of whom if his son shall ask bread, will he reach him a stone? Or if he shall ask him a fish, will he reach him a serpent? If you then being evil, know how to give good gifts to your children: how much more will your Father who is in heaven, give good things to them that ask him? All things therefore whatsoever you would that men should do to you, do you also to them. For this is the law and the prophets. Enter ye in at the narrow gate: for wide is the gate, and broad is the way that leadeth to destruction, and many there are who go in there at. How narrow is the gate, and strait is the way that leadeth to life: and few there are that find it!', 2),
(21, 'Beware of false prophets, who come to you in the clothing of sheep, but inwardly they are ravening wolves. By their fruits you shall know them. Do men gather grapes of thorns, or figs of thistles? Even so every good tree bringeth forth good fruit, and the evil tree bringeth forth evil fruit. A good tree cannot bring forth evil fruit, neither can an evil tree bring forth good fruit. Every tree that bringeth not forth good fruit, shall be cut down, and shall be cast into the fire. Wherefore by their fruits you shall know them.', 2),
(22, 'Not every one that saith to me, Lord, Lord, shall enter into the kingdom of heaven: but he that doth the will of my Father who is in heaven, he shall enter into the kingdom of heaven. Many will say to me in that day: Lord, Lord, have not we prophesied in thy name, and cast out devils in thy name, and done many miracles in thy name? And then will I profess unto them, I never knew you: depart from me, you that work iniquity.', 2),
(23, 'And when he had entered into Capharnaum, there came to him a centurion, beseeching him, And saying, Lord, my servant lieth at home sick of the palsy, and is grieviously tormented. And Jesus saith to him: I will come and heal him. And the centurion making answer, said: Lord, I am not worthy that thou shouldst enter under my roof: but only say the word, and my servant shall be healed. For I also am a man subject to authority, having under me soldiers; and I say to this, Go, and he goeth, and to another, Come, and he cometh, and to my servant, Do this, and he doeth it. And Jesus hearing this, marvelled; and said to them that followed him: Amen I say to you, I have not found so great faith in Israel. And I say to you that many shall come from the east and the west, and shall sit down with Abraham, and Isaac, and Jacob in the kingdom of heaven: But the children of the kingdom shall be cast out into the exterior darkness: there shall be weeping and gnashing of teeth. And Jesus said to the centurion: Go, and as thou hast believed, so be it done to thee. And the servant was healed at the same hour.', 2),
(24, 'And when he entered into the boat, his disciples followed him: And behold a great tempest arose in the sea, so that the boat was covered with waves, but he was asleep. And they came to him, and awaked him, saying: Lord, save us, we perish. And Jesus saith to them: Why are you fearful, O ye of little faith? Then rising up he commanded the winds, and the sea, and there came a great calm.', 2),
(25, 'Every one therefore that shall confess me before men, I will also confess him before my Father who is in heaven. But he that shall deny me before men, I will also deny him before my Father who is in heaven. Do not think that I came to send peace upon earth: I came not to send peace, but the sword. For I came to set a man at variance against his father, and the daughter against her mother, and the daughter in law against her mother in law. And a man\'s enemies shall be they of his own household. He that loveth father or mother more than me, is not worthy of me; and he that loveth son or daughter more than me, is not worthy of me. And he that taketh not up his cross, and followeth me, is not worthy of me.', 2),
(26, 'But what went you out to see? a man clothed in soft garments? Behold they that are clothed in soft garments, are in the houses of kings. But what went you out to see? a prophet? yea I tell you, and more than a prophet. For this is he of whom it is written: Behold I send my angel before thy face, who shall prepare thy way before thee. Amen I say to you, there hath not risen among them that are born of women a greater than John the Baptist: yet he that is the lesser in the kingdom of heaven is greater than he.', 2),
(28, 'And behold there was a man who had a withered hand, and they asked him, saying: Is it lawful to heal on the sabbath days? that they might accuse him. But he said to them: What man shall there be among you, that hath one sheep: and if the same fall into a pit on the sabbath day, will he not take hold on it and lift it up? How much better is a man than a sheep? Therefore it is lawful to do a good deed on the sabbath days. Then he saith to the man: Stretch forth thy hand; and he stretched it forth, and it was restored to health even as the other. And the Pharisees going out made a consultation against him, how they might destroy him.', 2),
(29, 'Another parable he proposed to them, saying: The kingdom of heaven is likened to a man that sowed good seeds in his field. But while men were asleep, his enemy came and oversowed cockle among the wheat and went his way. And when the blade was sprung up, and had brought forth fruit, then appeared also the cockle. And the servants of the goodman of the house coming said to him: Sir, didst thou not sow good seed in thy field? whence then hath it cockle? And he said to them: An enemy hath done this. And the servants said to him: Wilt thou that we go and gather it up? And he said: No, lest perhaps gathering up the cockle, you root up the wheat also together with it. Suffer both to grow until the harvest, and in the time of the harvest I will say to the reapers: Gather up first the cockle, and bind it into bundles to burn, but the wheat gather ye into my barn.', 2),
(30, 'Simon Peter answered and said: Thou art Christ, the Son of the living God. And Jesus answering, said to him: Blessed art thou, Simon Bar-Jona: because flesh and blood hath not revealed it to thee, but my Father who is in heaven. And I say to thee: That thou art Peter; and upon this rock I will build my church, and the gates of hell shall not prevail against it. And I will give to thee the keys of the kingdom of heaven. And whatsoever thou shalt bind upon earth, it shall be bound also in heaven: and whatsoever thou shalt loose upon earth, it shall be loosed also in heaven.', 2),
(31, 'At that hour the disciples came to Jesus, saying: Who thinkest thou is the greater in the kingdom of heaven? And Jesus calling unto him a little child, set him in the midst of them, And said: Amen I say to you, unless you be converted, and become as little children, you shall not enter into the kingdom of heaven. Whosoever therefore shall humble himself as this little child, he is the greater in the kingdom of heaven. And he that shall receive one such little child in my name, receiveth me. But he that shall scandalize one of these little ones that believe in me, it were better for him that a millstone should be hanged about his neck, and that he should be drowned in the depth of the sea.', 2),
(32, 'For the Son of man is come to save that which was lost. What think you? If a man have an hundred sheep, and one of them should go astray: doth he not leave the ninety-nine in the mountains, and go to seek that which is gone astray? And if it so be that he find it: Amen I say to you, he rejoiceth more for that, than for the ninety-nine that went not astray. Even so it is not the will of your Father, who is in heaven, that one of these little ones should perish. But if thy brother shall offend against thee, go, and rebuke him between thee and him alone. If he shall hear thee, thou shalt gain thy brother. And if he will not hear thee, take with thee one or two more: that in the mouth of two or three witnesses every word may stand. And if he will not hear them: tell the church. And if he will not hear the church, let him be to thee as the heathen and publican. Amen I say to you, whatsoever you shall bind upon earth, shall be bound also in heaven; and whatsoever you shall loose upon earth, shall be loosed also in heaven.', 2),
(33, 'And there came to him the Pharisees tempting him, and saying: Is it lawful for a man to put away his wife for every cause? Who answering, said to them: Have ye not read, that he who made man from the beginning, Made them male and female? And he said: For this cause shall a man leave father and mother, and shall cleave to his wife, and they two shall be in one flesh. Therefore now they are not two, but one flesh. What therefore God hath joined together, let no man put asunder.', 2),
(34, 'But Jesus called them to him, and said: You know that the princes of the Gentiles lord it over them; and they that are the greater, exercise power upon them. It shall not be so among you: but whosoever will be the greater among you, let him be your minister: And he that will be first among you, shall be your servant. Even as the Son of man is not come to be ministered unto, but to minister, and to give his life a redemption for many.', 2),
(35, 'And Jesus went into the temple of God, and cast out all them that sold and bought in the temple, and overthrew the tables of the money changers, and the chairs of them that sold doves: And he saith to them: It is written, My house shall be called the house of prayer; but you have made it a den of thieves. And there came to him the blind and the lame in the temple; and he healed them.', 2),
(36, 'And one of them, a doctor of the law, asking him, tempting him: Master, which is the greatest commandment in the law? Jesus said to him: Thou shalt love the Lord thy God with thy whole heart, and with thy whole soul, and with thy whole mind. This is the greatest and the first commandment. And the second is like to this: Thou shalt love thy neighbour as thyself. On these two commandments dependeth the whole law and the prophets.', 2),
(37, 'Then shall the kingdom of heaven be like to ten virgins, who taking their lamps went out to meet the bridegroom and the bride. And five of them were foolish, and five wise. But the five foolish, having taken their lamps, did not take oil with them: But the wise took oil in their vessels with the lamps. And the bridegroom tarrying, they all slumbered and slept. And at midnight there was a cry made: Behold the bridegroom cometh, go ye forth to meet him. Then all those virgins arose and trimmed their lamps. And the foolish said to the wise: Give us of your oil, for our lamps are gone out. The wise answered, saying: Lest perhaps there be not enough for us and for you, go ye rather to them that sell, and buy for yourselves. Now whilst they went to buy, the bridegroom came: and they that were ready, went in with him to the marriage, and the door was shut. But at last come also the other virgins, saying: Lord, Lord, open to us. But he answering said: Amen I say to you, I know you not.', 2),
(38, 'Then shall the king say to them that shall be on his right hand: Come, ye blessed of my Father, possess you the kingdom prepared for you from the foundation of the world. For I was hungry, and you gave me to eat; I was thirsty, and you gave me to drink; I was a stranger, and you took me in: Naked, and you covered me: sick, and you visited me: I was in prison, and you came to me. Then shall the just answer him, saying: Lord, when did we see thee hungry, and fed thee; thirsty, and gave thee drink? And when did we see thee a stranger, and took thee in? or naked, and covered thee? Or when did we see thee sick or in prison, and came to thee? And the king answering, shall say to them: Amen I say to you, as long as you did it to one of these my least brethren, you did it to me.', 2),
(39, 'And it came to pass, in those days, Jesus came from Nazareth of Galilee, and was baptized by John in the Jordan. And forthwith coming up out of the water, he saw the heavens opened, and the Spirit as a dove descending, and remaining on him. And there came a voice from heaven: Thou art my beloved Son; in thee I am well pleased.', 1),
(40, 'And the scribes and the Pharisees, seeing that he ate with publicans and sinners, said to his disciples: Why doth your master eat and drink with publicans and sinners? Jesus hearing this, saith to them: They that are well have no need of a physician, but they that are sick. For I came not to call the just, but sinners. And the disciples of John and the Pharisees used to fast; and they come and say to him: Why do the disciples of John and of the Pharisees fast; but thy disciples do not fast? And Jesus saith to them: Can the children of the marriage fast, as long as the bridegroom is with them? As long as they have the bridegroom with them, they cannot fast. But the days will come when the bridegroom shall be taken away from them; and then they shall fast in those days.', 1),
(41, 'Hear ye: Behold, the sower went out to sow. And whilst he sowed, some fell by the way side, and the birds of the air came and ate it up. And other some fell upon stony ground, where it had not much earth; and it shot up immediately, because it had no depth of earth. And when the sun was risen, it was scorched; and because it had no root, it withered away. And some fell among thorns; and the thorns grew up, and choked it, and it yielded no fruit. And some fell upon good ground; and brought forth fruit that grew up, and increased and yielded, one thirty, another sixty, and another a hundred. And he said: He that hath ears to hear, let him hear.', 1),
(42, 'He that soweth, soweth the word. And these are they by the way side, where the word is sown, and as soon as they have heard, immediately Satan cometh and taketh away the word that was sown in their hearts. And these likewise are they that are sown on the stony ground: who when they have heard the word, immediately receive it with joy. And they have no root in themselves, but are only for a time: and then when tribulation and persecution ariseth for the word they are presently scandalized. And others there are who are sown among thorns: these are they that hear the word, And the cares of the world, and the deceitfulness of riches, and the lusts after other things entering in choke the word, and it is made fruitless. And these are they who are sown upon the good ground, who hear the word, and receive it, and yield fruit, the one thirty, another sixty, and another a hundred.', 1),
(43, 'And he said: To what shall we liken the kingdom of God? or to what parable shall we compare it? It is as a grain of mustard seed: which when it is sown in the earth, is less than all the seeds that are in the earth: And when it is sown, it groweth up, and becometh greater than all herbs, and shooteth out great branches, so that the birds of the air may dwell under the shadow thereof.', 1),
(44, 'And there arose a great storm of wind, and the waves beat into the ship, so that the ship was filled. And he was in the hinder part of the ship, sleeping upon a pillow; and they awake him, and say to him: Master, doth it not concern thee that we perish? And rising up, he rebuked the wind, and said to the sea: Peace, be still. And the wind ceased: and there was made a great calm. And he said to them: Why are you fearful? have you not faith yet? And they feared exceedingly: and they said one to another: Who is this (thinkest thou) that both wind and sea obey him?', 1),
(45, 'And a woman who was under an issue of blood twelve years, And had suffered many things from many physicians; and had spent all that she had, and was nothing the better, but rather worse, When she had heard of Jesus, came in the crowd behind him, and touched his garment. For she said: If I shall touch but his garment, I shall be whole. And forthwith the fountain of her blood was dried up, and she felt in her body that she was healed of the evil. And immediately Jesus knowing in himself the virtue that had proceeded from him, turning to the multitude, said: Who hath touched my garments? And his disciples said to him: Thou seest the multitude thronging thee, and sayest thou who hath touched me? And he looked about to see her who had done this. But the woman fearing and trembling, knowing what was done in her, came and fell down before him, and told him all the truth. And he said to her: Daughter, thy faith hath made thee whole: go in peace, and be thou whole of thy disease.', 1),
(46, 'And going out from thence, he went into his own country; and his disciples followed him. And when the sabbath was come, he began to teach in the synagogue: and many hearing him were in admiration at his doctrine, saying: How came this man by all these things? and what wisdom is this that is given to him, and such mighty works as are wrought by his hands? Is not this the carpenter, the son of Mary, the brother of James, and Joseph, and Jude, and Simon? are not also his sisters here with us? And they were scandalized in regard of him. And Jesus said to them: A prophet is not without honor, but in his own country, and in his own house, and among his own kindred. And he could not do any miracles there, only that he cured a few that were sick, laying his hands upon them.', 1),
(47, 'And when the daughter of the same Herodias had come in, and had danced, and pleased Herod, and them that were at table with him, the king said to the damsel: Ask of me what thou wilt, and I will give it thee. And he swore to her: Whatsoever thou shalt ask I will give thee, though it be the half of my kingdom. Who when she was gone out, said to her mother, What shall I ask? But she said: The head of John the Baptist. And when she was come in immediately with haste to the king, she asked, saying: I will that forthwith thou give me in a dish, the head of John the Baptist. And the king was struck sad. Yet because of his oath, and because of them that were with him at table, he would not displease her: But sending an executioner, he commanded that his head should be brought in a dish. And he beheaded him in the prison, and brought his head in a dish: and gave it to the damsel, and the damsel gave it to her mother.', 1),
(48, 'And he saith to them: So are you also without knowledge? understand you not that every thing from without, entering into a man cannot defile him: Because it entereth not into his heart, but goeth into the belly, and goeth out into the privy, purging all meats? But he said that the things which come out from a man, they defile a man. For from within out of the heart of men proceed evil thoughts, adulteries, fornications, murders, Thefts, covetousness, wickedness, deceit, lasciviousness, an evil eye, blasphemy, pride, foolishness. All these evil things come from within, and defile a man.', 1),
(49, 'In those days again, when there was a great multitude, and had nothing to eat; calling his disciples together, he saith to them: I have compassion on the multitude, for behold they have now been with me three days, and have nothing to eat. And if I shall send them away fasting to their home, they will faint in the way; for some of them came from afar off. And his disciples answered him: From whence can any one fill them here with bread in the wilderness? And he asked them: How many loaves have ye? Who said: Seven.', 1),
(50, 'And they reasoned among themselves, saying: Because we have no bread. Which Jesus knowing, saith to them: Why do you reason, because you have no bread? do you not yet know nor understand? have you still your heart blinded? Having eyes, see you not? and having ears, hear you not? neither do you remember. When I broke the five loaves among five thousand, how many baskets full of fragments took you up? They say to him, Twelve. When also the seven loaves among four thousand, how many baskets of fragments took you up? And they say to him, Seven.', 1),
(51, 'For what shall it profit a man, if he gain the whole world, and suffer the loss of his soul? Or what shall a man give in exchange for his soul? For he that shall be ashamed of me, and of my words, in this adulterous and sinful generation: the Son of man also will be ashamed of him, when he shall come in the glory of his Father with the holy angels. And he said to them: Amen I say to you, that there are some of them that stand here, who shall not taste death, till they see the kingdom of God coming in power.', 1),
(52, 'But Jesus taking him by the hand, lifted him up; and he arose. And when he was come into the house, his disciples secretly asked him: Why could not we cast him out? And he said to them: This kind can go out by nothing, but by prayer and fasting.', 1),
(53, 'But they understood not the word, and they were afraid to ask him. And they came to Capharnaum. And when they were in the house, he asked them: What did you treat of in the way? But they held their peace, for in the way they had disputed among themselves, which of them should be the greatest. And sitting down, he called the twelve, and saith to them: If any man desire to be first, he shall be the last of all, and the minister of all. And taking a child, he set him in the midst of them. Whom when he had embraced, he saith to them: Whosoever shall receive one such child as this in my name, receiveth me. And whosoever shall receive me, receiveth not me, but him that sent me. John answered him, saying: Master, we saw one casting out devils in thy name, who followeth not us, and we forbade him. But Jesus said: Do not forbid him. For there is no man that doth a miracle in my name, and can soon speak ill of me. For he that is not against you, is for you. For whosoever shall give you to drink a cup of water in my name, because you belong to Christ: amen I say to you, he shall not lose his reward.', 1),
(54, 'And whosoever shall scandalize one of these little ones that believe in me; it were better for him that a millstone were hanged around his neck, and he were cast into the sea. And if thy hand scandalize thee, cut it off: it is better for thee to enter into life, maimed, than having two hands to go into hell, into unquenchable fire: Where their worm dieth not, and the fire is not extinguished. And if thy foot scandalize thee, cut it off. It is better for thee to enter lame into life everlasting, than having two feet, to be cast into the hell of unquenchable fire: Where their worm dieth not, and the fire is not extinguished.', 1),
(55, 'And the Pharisees coming to him asked him: Is it lawful for a man to put away his wife? tempting him. But he answering, saith to them: What did Moses command you? Who said: Moses permitted to write a bill of divorce, and to put her away. To whom Jesus answering, said: Because of the hardness of your heart he wrote you that precept. But from the beginning of the creation, God made them male and female. For this cause a man shall leave his father and mother; and shall cleave to his wife. And they two shall be in one flesh. Therefore now they are not two, but one flesh. What therefore God hath joined together, let not man put asunder. And in the house again his disciples asked him concerning the same thing.', 1),
(56, 'And he saith to them: Whosoever shall put away his wife and marry another, committeth adultery against her. And if the wife shall put away her husband, and be married to another, she committeth adultery. And they brought to him young children, that he might touch them. And the disciples rebuked them that brought them. Whom when Jesus saw, he was much displeased, and saith to them: Suffer the little children to come unto me, and forbid them not; for of such is the kingdom of God. Amen I say to you, whosoever shall not receive the kingdom of God as a little child, shall not enter into it.', 1),
(57, 'And Jesus looking on him, loved him, and said to him: One thing is wanting unto thee: go, sell whatsoever thou hast, and give to the poor, and thou shalt have treasure in heaven; and come, follow me. Who being struck sad at that saying, went away sorrowful: for he had great possessions. And Jesus looking round about, saith to his disciples: How hardly shall they that have riches, enter into the kingdom of God! And the disciples were astonished at his words. But Jesus again answering, saith to them: Children, how hard is it for them that trust in riches, to enter into the kingdom of God? It is easier for a camel to pass through the eye of a needle, than for a rich man to enter into the kingdom of God.', 1),
(58, 'Who wondered the more, saying among themselves: Who then can be saved? And Jesus looking on them, saith: With men it is impossible; but not with God: for all things are possible with God. And Peter began to say unto him: Behold, we have left all things, and have followed thee. Jesus answering, said: Amen I say to you, there is no man who hath left house or brethren, or sisters, or father, or mother, or children, or lands, for my sake and for the gospel, Who shall not receive an hundred times as much, now in this time; houses, and brethren, and sisters, and mothers, and children, and lands, with persecutions: and in the world to come life everlasting.', 1),
(59, 'But he said to them: What would you that I should do for you? And they said: Grant to us, that we may sit, one on thy right hand, and the other on thy left hand, in thy glory. And Jesus said to them: You know not what you ask. Can you drink of the chalice that I drink of: or be baptized with the baptism wherewith I am baptized? But they said to him: We can. And Jesus saith to them: You shall indeed drink of the chalice that I drink of: and with the baptism wherewith I am baptized, you shall be baptized. But to sit on my right hand, or on my left, is not mine to give to you, but to them for whom it is prepared. And the ten hearing it, began to be much displeased at James and John.', 1),
(60, 'Therefore I say unto you, all things, whatsoever you ask when ye pray, believe that you shall receive; and they shall come unto you. And when you shall stand to pray, forgive, if you have aught against any man; that your Father also, who is in heaven, may forgive you your sins. But if you will not forgive, neither will your Father that is in heaven, forgive you your sins.', 1),
(61, 'And he began to speak to them in parables: A certain man planted a vineyard and made a hedge about it, and dug a place for the winefat, and built a tower, and let it to husbandmen; and went into a far country. And at the season he sent to the husbandmen a servant to receive of the husbandmen of the fruit of the vineyard. Who having laid hands on him, beat him, and sent him away empty. And again he sent to them another servant; and him they wounded in the head, and used him reproachfully. And again he sent another, and him they killed: and many others, of whom some they beat, and others they killed. Therefore having yet one son, most dear to him; he also sent him unto them last of all, saying: They will reverence my son. But the husbandmen said one to another: This is the heir; come let us kill him; and the inheritance shall be ours. And laying hold on him, they killed him, and cast him out of the vineyard. What therefore will the lord of the vineyard do? He will come and destroy those husbandmen; and will give the vineyard to others. And have you not read this scripture, The stone which the builders rejected, the same is made the head of the corner:', 1),
(62, 'And the second took her, and died: and neither did he leave any issue. And the third in like manner. And the seven all took her in like manner; and did not leave issue. Last of all the woman also died. In the resurrection therefore, when they shall rise again, whose wife shall she be of them? for the seven had her to wife. And Jesus answering, saith to them: Do ye not therefore err, because you know not the scriptures, nor the power of God? For when they shall rise again from the dead, they shall neither marry, nor be married, but are as the angels in heaven.', 1),
(63, 'For David himself saith by the Holy Ghost: The Lord said to my Lord, Sit on my right hand, until I make thy enemies thy footstool. David therefore himself calleth him Lord, and whence is he then his son? And a great multitude heard him gladly. And he said to them in his doctrine: Beware of the scribes, who love to walk in long robes, and to be saluted in the marketplace, And to sit in the first chairs, in the synagogues, and to have the highest places at suppers: Who devour the houses of widows under the pretence of long prayer: these shall receive greater judgment.', 1),
(64, 'Now the feast of the pasch, and of the Azymes was after two days; and the chief priests and the scribes sought how they might by some wile lay hold on him, and kill him. But they said: Not on the festival day, lest there should be a tumult among the people. And when he was in Bethania, in the house of Simon the leper, and was at meat, there came a woman having an alabaster box of ointment of precious spikenard: and breaking the alabaster box, she poured it out upon his head. Now there were some that had indignation within themselves, and said: Why was this waste of the ointment made? For this ointment might have been sold for more than three hundred pence, and given to the poor. And they murmured against her. \"Azymes\": That is, the feast of the unleavened bread. But Jesus said: Let her alone, why do you molest her? She hath wrought a good work upon me. For the poor you have always with you: and whensoever you will, you may do them good: but me you have not always. She hath done what she could: she is come beforehand to anoint my body for burial. Amen, I say to you, wheresoever this gospel shall be preached in the whole world, that also which she hath done, shall be told for a memorial of her. And Judas Iscariot, one of the twelve, went to the chief priests, to betray him to them.', 1),
(66, 'Now on the festival day he was wont to release unto them one of the prisoners, whomsoever they demanded. And there was one called Barabbas, who was put in prison with some seditious men, who in the sedition had committed murder. And when the multitude was come up, they began to desire that he would do, as he had ever done unto them. And Pilate answered them, and said: Will you that I release to you the king of the Jews? For he knew that the chief priests had delivered him up out of envy. But the chief priests moved the people, that he should rather release Barabbas to them. And Pilate again answering, saith to them: What will you then that I do to the king of the Jews? But they again cried out: Crucify him. And Pilate saith to them: Why, what evil hath he done? But they cried out the more: Crucify him. And so Pilate being willing to satisfy the people, released to them Barabbas, and delivered up Jesus, when he had scourged him, to be crucified.', 1),
(67, 'And the inscription of his cause was written over: THE KING OF THE JEWS. And with him they crucify two thieves; the one on his right hand, and the other on his left. And the scripture was fulfilled, which saith: And with the wicked he was reputed. And they that passed by blasphemed him, wagging their heads, and saying: Vah, thou that destroyest the temple of God, and in three days buildest it up again; Save thyself, coming down from the cross. In like manner also the chief priests mocking, said with the scribes one to another: He saved others; himself he cannot save. Let Christ the king of Israel come down now from the cross, that we may see and believe. And they that were crucified with him reviled him. And when the sixth hour was come, there was darkness over the whole earth until the ninth hour. And at the ninth hour, Jesus cried out with a loud voice, saying: Eloi, Eloi, lamma sabacthani? Which is, being interpreted, My God, my God, why hast thou forsaken me? And some of the standers by hearing, said: Behold he calleth Elias.', 1),
(68, 'Then he shall say to them also that shall be on his left hand: Depart from me, you cursed, into everlasting fire which was prepared for the devil and his angels. For I was hungry, and you gave me not to eat: I was thirsty, and you gave me not to drink. I was a stranger, and you took me not in: naked, and you covered me not: sick and in prison, and you did not visit me. Then they also shall answer him, saying: Lord, when did we see thee hungry, or thirsty, or a stranger, or naked, or sick, or in prison, and did not minister to thee? Then he shall answer them, saying: Amen I say to you, as long as you did it not to one of these least, neither did you do it to me. And these shall go into everlasting punishment: but the just, into life everlasting.', 2),
(69, 'And Jesus sitting over against the treasury, beheld how the people cast money into the treasury, and many that were rich cast in much. And there came a certain poor widow, and she cast in two mites, which make a farthing. And calling his disciples together, he saith to them: Amen I say to you, this poor widow hath cast in more than all they who have cast into the treasury. For all they did cast in of their abundance; but she of her want cast in all she had, even her whole living.', 1),
(70, 'But Jesus calling them, saith to them: You know that they who seem to rule over the Gentiles, lord it over them: and their princes have power over them. But it is not so among you: but whosoever will be greater, shall be your minister. And whosoever will be first among you, shall be the servant of all. For the Son of man also is not come to be ministered unto, but to minister, and to give his life a redemption for many.', 1),
(71, 'Where there is a proximate danger to the faith, prelates must be rebuked, even publicly, by subjects. Thus, St. Paul, who was subject to St. Peter, rebuked him publicly. Commentary on the Epistle to the Galations 2:14.', 21),
(72, 'P: In nomine Patris, et Filii, et Spiritus Sancti. Amen. Introibe Ad Altare Dei. R: Ad Deum, qui laetificat juventutem meam. P: Judica me, Deus, et discerne causam meam de gente non sancta: abhomine iniquo et doloso erue me. R: Quea tu es, Deus, Fortitudo mea: Quare me repulisti, et quare tristis incedo, dum affligit me inimicus? P: Emitte lucem tuam et veritatem tuam: ipsa me deduxerunt, et adduxerunt in montem sanctum tuum et in tabernacula tua. R: Et introibo ad altere Dei: ad Deum, qui laetificat juventutem meam. P: Confitebor tibi in cithara, Deus, Deus meus: quare tristis es, anima mea, et quare conturbas me? R: Spera in Deo, quoniam adhuc confitebor illi: salutare vultus mei, et Deus meus. P: Gloria Patri, et Filio, et Spiritui Sancto. R: Sicut erat in principio, et nunc, et semper saecula saeculorum amen. P: Introibo ad altere Dei. R: Ad Deum, qui laetificat juventutem meam. P: Adjutorium nostrum in nomine Domini. R: Qui fecit caelum et terram.', 28),
(73, 'P: Confiteor Deo omnipotenti... R: Misereatur tui omnipotens Deus, et, dimissis peccatis tuis, perducat te ad vitam aeternam. P: Amen. R: Confiteor Deo omnipotenti, beatae Maria semper Virgini, beato Michaeli Archangelo, beato Joanni Baptistae, sanctis Apostolis Petro et Paulo, omnibus Sanctis, et tibi, pater: quia peccavi nimis cogitatione, verbo et opere: mea culpa, mea culpa, mea maxima culpa. Ideo precor beatam Mariam semper Virginem, beatum Michaelem Archangelum, beatum Joannem Baptistam, sanctos Apostolos Petrum et Paulum, omnes Sanctos, et te, pater, orare pro me ad Dominum, Deum nostrum. P: Misereatur vestri omnipotens Deus, et, dimissis peccatis vestris, perducat vos ad vitam aeternam. R: Amen. P: Indulgentiam, absolutionem, et remissionem peccatorum nostrorum tribuat nobis omnipotens et misericors Dominus. R: Amen. P: Deus, tu conversus vivificabis nos, R: Et plebs tua laetabitur in te. P: Ostende nobis, Domine, misericordiam tuam. R: Et salutare tuum da nobis. P: Domine, exaudi orationem mea. R: Et clamor meus ad te veniat. P: Dominus vobiscum: R: Et cum spiritu tuo. P: Oremus.', 28),
(74, 'Gloria in excelcis Deo. Et in terra pax hominibus bonae voluntatis. Laudamus Te. Benedicimus te. Adoramus te. Glorificamus te, Gratias agimus tibi propter magnam gloriam tuam. Domine Deus, Rex caelestis, Deus Pater omnipotens. Domine fili unigenite, Jesu Christe. Domine Deus, Agnus Dei, Filius Patris. Qui tollis peccata mundi, misere nobis. Qui tollis peccata mundi, suscipe deprecationem nostram. Qui sedes ad dexteram Patris, misere nobis. Quoniam tu solus sanctus. Tu solus Dominus, Tu solus Altissimus, Jesu Christe. Cum Sancto Spiritu, in Gloria Dei Patris. Amen.', 32),
(75, 'Credo in unum Deum, Patrem omnipotentem, factorem caeli et terrae, visibilium omnium, et invisibilium omnium, et invisibilium. Et in unum dominum Jesum Christum, Filium Dei unigenitum. Et ex Patre natum ante omnia saecula. Deum de Deo, lumen de lumine, Deum verum de Deo vero. Genitum, non factum, consubstantialem patri: per quem omnia facta sunt. Qui propter nos homines, et propter nostram salutem descendit de caelis. ET INCARNATUS EST DE SPIRITU SANCTO EX MARIA VIRGINI: ET HOMO FACTUS EST. Crucifixus etiam pro nobis: sub Pontio Pilato passus, et sepultus est. Et resurrexit tertia die, secundum Scripturas. Et ascendit in caelum: sedet ad dexteram Patris. Et iterum venturus est cum Gloria judicare vivos, et mortuos: cujus regni non erit finis. Et in Spiritum Sanctum, Dominum et vivificantem: qui ex Patre, Filioque procedit. Qui cum Patre, et Filio simul adoratur, et conglorificatur: qui locutus est per Prophetas. Et unam sanctam catholicam et apostolicam Ecclesiam. Confiteor unum baptisma in remissionem peccatorum. Et exspecto resurrectionem mortuorum. Et vitam venturi saeculi. Amen.', 33);
INSERT INTO `texts` (`id`, `text`, `subcategoryID`) VALUES
(76, 'P: Orate, fratres: ut meum ac vestrum sacrificium acceptabile fiat apud Deum Patrem omnipotentem. R: Suscipiat Dominus sacrificium de manibus tuis ad laudem, et gloriam nominis sui, ad utilitatem quoque nostram, totiusque ecclesiae suae sanctae.', 31),
(77, 'Sanctus, Sanctus, Sanctus, Dominus Deus sabaoth. Pleni sunt caeli et terra gloria tua. Hosanna in Excelcis. Benedictus qui venit in nomine Domini. Hosanna in Excelcis.', 34),
(78, 'Laity: Confiteor Deo omnipotenti, beatae Mariae semper Virgini, beato Michaeli Archangelo, beato Joanni Baptistae, sanctis apostolis Petro et Paulo, omnibus Sanctis, et tibi, pater: quia peccavi nimis cogitatione, verbo et opere: mea culpa, mea culpa, mea maxima culpa. Ideo precor beatam Mariam semper Virginem, beatum Michaelem Archangelum, beatum Joannem Baptistam, sanctos Apostolos Petrum et Paulum, omnes Sanctos, et te, pater, orare pro me ad Dominum, Deum nostrum. P: Misereatur vestri omnipotens Deus, et dimissis peccatis vestris, perducat te ad vitam aeternam. R: Amen. P: Indulgentiam, absolutionem et remissionem peccatorum vestrorum tribuat vobis omnipotens et misericors Dominus. R: Amen. P: Ecce Agnus Dei, qui tollis peccata mundi. R: Domine, non sum dignus, ut intres sub tectum meum: sed tantum dic verbo, et sanabitur anima mea.', 29),
(79, 'In principio erat Verbum, et Verbum erat apud Deum, et Deus erat Verbum. Hoc erat in principio apud Deum. Omnia per ipsum facta sunt: et sine ipso factum est nihil, quod factum est: in ipso vita erat, et vita erat lux hominum: et lux in tenebris lucet, et tenebrae eam non comprehenderunt. Fuit homo missus a Deo, cui nomen erat Joannes. Hic venit in testimonium, ut testimonium perhiberet de lumine, ut omnes crederent per ilum. Non erat ille lux, sed ut testimonium, perhiberet de lumine. Erat lux vera, quae illuminat omnem hominem venientem in hunc mundum. In mundo erat, et mundus per ipsum factus est, et mundus eum non cognovit. In propria venit, et sui cum non receperunt. Quotquot autem receperunt cum, detis eis potestatem filios Dei fieri, his, qui credunt in nomini ejus: qui non ex sanguinibus, neque ex voluntate carnis, neque ex voluntate viri, sed ex Deo nati sunt. ET VERBUM CARO FACTUM EST, et habitavit in nobus: et vidimus gloriam ejus, gloriam quasi unigeniti a Patre, plenum gratiae et veritatis.', 30),
(80, 'P: Adjutorium nostri in nomine Domini. R: Qui faecit caelum et terram. P: Procedamus in pace. R: In nomine Christi, Amen. -- P: Laudetur Iesus Christus. R: Ex hoc nunc et usque in saeculorum, amen. Jube domne benedicere. P: Benedicerio Dei est.', 35),
(81, 'Sancte Michael Archangele, defende nos in proelio, contra nequitiam et insidias diaboli esto praesidium. Imperet illi Deus, supplices deprecamur: tuque, princeps militiae caelestis, Satanam aliosque spiritus malignos, qui ad perditionem animarum pervagantur in mundo, divina virtute, in infernum detrude. Amen.', 36);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_first` varchar(256) COLLATE utf8_bin NOT NULL,
  `user_last` varchar(256) COLLATE utf8_bin NOT NULL,
  `user_email` varchar(256) COLLATE utf8_bin NOT NULL,
  `user_uid` varchar(256) COLLATE utf8_bin NOT NULL,
  `user_pwd` varchar(256) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first`, `user_last`, `user_email`, `user_uid`, `user_pwd`) VALUES
(1, 'Sander', 'Buruma', 'sanderburuma@gmail.com', 'Cubit32', '$2y$10$5NhbnNwma1lBo/vxqK/.8OptEVfh1Qok0eh9/V8wfqGrRcH6w452q'),
(5, 'Jim', 'Booker', 'jimbo101@yahoo.com', 'Jimmy25', '$2y$10$oO0ZjF703YLZG1oH.4T3ju5R1lg1FqV/LNOQLd3Zvsdjq8tHPWOQ2'),
(6, 'peter', 'schoenmaker', 'peter8438@yahoo.com', 'peter', '$2y$10$eEfLv16wfIw5NkKt29EqEu8tEufO9bSrO0X2UZy/LnHmvT30u6qui'),
(7, 'karel', 'schoenmaker', 'karel123532@gmail.com', 'puntje', '$2y$10$5J2bPnf3JKhv9HSCrTEdOeZuEtMuqGJM.NXPJLjgwrW3ZSEU9PRHu'),
(8, 'grietje', 'verstappen', 'grietje@zoetenhuis.nl', 'grietje25', '$2y$10$gIw9F1L3aAYp1PhoYEvYU.A/OP0irMGJYGm0QbXoTzsxGAlSjfjme');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcategoryID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Indexes for table `texts`
--
ALTER TABLE `texts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategoryID` (`subcategoryID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcategoryID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `texts`
--
ALTER TABLE `texts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`);

--
-- Constraints for table `texts`
--
ALTER TABLE `texts`
  ADD CONSTRAINT `texts_ibfk_1` FOREIGN KEY (`subcategoryID`) REFERENCES `subcategory` (`subcategoryID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

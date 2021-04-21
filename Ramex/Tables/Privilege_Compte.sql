USE [RAMEX]
GO

/****** Object:  Table [dbo].[Privilege_Compte]    Script Date: 28/12/2020 10:57:26 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[Privilege_Compte](
	[num_privilege] [int] NOT NULL,
	[id_compte] [int] NOT NULL,
	[etat] [int] NULL,
 CONSTRAINT [PK_Privilege_Client] PRIMARY KEY CLUSTERED
(
	[num_privilege] ASC,
	[id_compte] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

ALTER TABLE [dbo].[Privilege_Compte]  WITH NOCHECK ADD  CONSTRAINT [FK_Privilege_Client_Privilege] FOREIGN KEY([num_privilege])
REFERENCES [dbo].[Privilege] ([num_privilege])
ON UPDATE CASCADE
GO

ALTER TABLE [dbo].[Privilege_Compte] CHECK CONSTRAINT [FK_Privilege_Client_Privilege]
GO

ALTER TABLE [dbo].[Privilege_Compte]  WITH CHECK ADD  CONSTRAINT [FK_Privilege_Compte_Compte] FOREIGN KEY([id_compte])
REFERENCES [dbo].[Compte] ([id_compte])
ON UPDATE CASCADE
GO

ALTER TABLE [dbo].[Privilege_Compte] CHECK CONSTRAINT [FK_Privilege_Compte_Compte]
GO
